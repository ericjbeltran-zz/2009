using System;
using System.Web;
using System.Web.Profile;
using GalleryServerPro.Web.Entity;

namespace GalleryServerPro.Web.Controller
{
	/// <summary>
	/// Contains functionality related to managing the user profile.
	/// </summary>
	public static class ProfileController
	{
		#region Private Fields

		//private static readonly ProfileProvider _profileProvider = GetProfileProvider();

		#endregion

		#region Properties

		/// <summary>
		/// Gets the Profile provider used by Gallery Server Pro.
		/// </summary>
		/// <value>The Profile provider used by Gallery Server Pro.</value>
		//public static ProfileProvider ProfileGsp
		//{
		//  get
		//  {
		//    return _profileProvider;
		//  }
		//}

		#endregion

		#region Public Methods

		/// <overloads>
		/// Gets a user's profile settings. The UserName property will be an empty string for anonymous users and the remaining properties will be set to
		/// default values.
		/// </overloads>
		/// <summary>
		/// Gets the profile for the current user.
		/// </summary>
		/// <returns>Gets the profile for the current user.</returns>
		public static ProfileEntity GetProfile()
		{
			return GetProfile(Util.UserName);
		}

		/// <summary>
		/// Gets the profile for the specified user. 
		/// </summary>
		/// <param name="userName">The account name for the user whose profile settings are to be retrieved. You can specify null or an empty string
		/// for anonymous users.</param>
		/// <returns>Gets the profile for the specified user.</returns>
		public static ProfileEntity GetProfile(string userName)
		{
			if (Util.IsAuthenticated)
			{
				return GetProfileFromDataStore(userName);
			}
			else
			{
				return GetProfileFromSession(userName) ?? new ProfileEntity();
			}
		}

		/// <summary>
		/// Saves the profile for the currently logged on user. The profile is saved to session for all users; for logged-on users the profile is
		/// also saved to the profile provider.
		/// </summary>
		/// <param name="userProfile">The user profile to save.</param>
		public static void SaveProfile(ProfileEntity userProfile)
		{
			if (userProfile == null)
				throw new ArgumentNullException("userProfile");

			if (Util.IsAuthenticated)
			{
				SaveProfileToDataStore(userProfile);
			}

			SaveProfileToSession(userProfile);
		}

		/// <summary>
		/// Removes the current user's profile from session. This session key has a unique name based on the session ID and logged-on 
		/// user's name. This function is not critical for security or correctness, but is useful in keeping the session cleared of unused items. When
		/// a user logs on or off, their username changes - and therefore the name of the session key changes, which causes the next call to 
		/// retrieve the user's profile to return nothing from the cache, which forces a retrieval from the database. Thus the correct profile will
		/// always be retrieved, even if this function is not invoked during a logon/logoff event.
		/// </summary>
		public static void RemoveProfileFromSession()
		{
			if (HttpContext.Current.Session != null)
			{
				HttpContext.Current.Session.Remove(GetSessionKeyNameForProfile(Util.UserName));
			}
		}

		#endregion

		#region Private Functions

		private static ProfileEntity GetProfileFromDataStore(string userName)
		{
			// We can save a hit to the database by retrieving the profile from session once it has been initially retrieved from the data store.
			ProfileEntity profile = GetProfileFromSession(userName);
			if (profile != null)
			{
				// We found a profile, so no need to go to the data store.
				return profile;
			}

			// No profile in session. Get from data store and then store in session.
			ProfileBase p = ProfileBase.Create(userName, Util.IsAuthenticated);

			ProfileEntity pe = new ProfileEntity();
			pe.UserName = userName;

			bool showMediaObjectMetadata;
			if (Boolean.TryParse(p.GetPropertyValue(Constants.SHOW_METADATA_PROFILE_NAME).ToString(), out showMediaObjectMetadata))
			{
				pe.ShowMediaObjectMetadata = showMediaObjectMetadata;
			}

			int userAlbumId;
			if (Int32.TryParse(p.GetPropertyValue(Constants.USER_ALBUM_ID_PROFILE_NAME).ToString(), out userAlbumId))
			{
				pe.UserAlbumId = userAlbumId;
			}

			bool enableUserAlbum;
			if (Boolean.TryParse(p.GetPropertyValue(Constants.ENABLE_USER_ALBUM_PROFILE_NAME).ToString(), out enableUserAlbum))
			{
				pe.EnableUserAlbum = enableUserAlbum;
			}

			// Save to session for quicker access next time.
			SaveProfileToSession(pe);

			return pe;
		}

		private static ProfileEntity GetProfileFromSession(string userName)
		{
			ProfileEntity pe = null;
			if (HttpContext.Current.Session != null)
			{
				pe = HttpContext.Current.Session[GetSessionKeyNameForProfile(userName)] as ProfileEntity;
			}

			return pe;
		}

		private static void SaveProfileToDataStore(ProfileEntity userProfile)
		{
			ProfileBase p = ProfileBase.Create(userProfile.UserName, Util.IsAuthenticated);

			if (!p.IsAnonymous)
			{
				// Only save these for logged-on users.
				p.SetPropertyValue(Constants.SHOW_METADATA_PROFILE_NAME, userProfile.ShowMediaObjectMetadata.ToString());

				p.SetPropertyValue(Constants.USER_ALBUM_ID_PROFILE_NAME, userProfile.UserAlbumId);

				p.SetPropertyValue(Constants.ENABLE_USER_ALBUM_PROFILE_NAME, userProfile.EnableUserAlbum.ToString());
			}

			p.Save();
		}

		private static void SaveProfileToSession(ProfileEntity userProfile)
		{
			if (HttpContext.Current.Session != null)
			{
				HttpContext.Current.Session[GetSessionKeyNameForProfile(userProfile.UserName)] = userProfile;
			}
		}


		/// <summary>
		/// Gets the name that identifies the session item that holds the current user's profile. The key is unique for each session ID / username 
		/// combination. This prevents us from retrieving the wrong profile after logon/logout events.
		/// </summary>
		/// <param name="userName">Name of the user.</param>
		/// <returns>Returns the name that identifies the session item that holds the current user's profile.</returns>
		private static string GetSessionKeyNameForProfile(string userName)
		{
			return String.Concat(HttpContext.Current.Session.SessionID, "_", userName, "_Profile");
		}

		#endregion

	}
}
