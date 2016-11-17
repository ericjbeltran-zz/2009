using System;
using GalleryServerPro.ErrorHandler.CustomExceptions;
using System.Web.UI;

namespace GalleryServerPro.Web.gs.pages.error
{
	public partial class invalidlicense : UserControl
	{
		protected void Page_Load(object sender, EventArgs e)
		{
			this.ConfigureControls();
		}

		private void ConfigureControls()
		{
			imgGspLogo.ImageUrl = Util.GetUrl("/images/gsp_logo_313x75.png");
			hlHome.NavigateUrl = Util.GetCurrentPageUrl();

			// The global error handler in Gallery.cs should have, just prior to transferring to this page, the original
			// InvalidLicenseException instance. Grab this instance and display its message.
			InvalidLicenseException ex = System.Web.HttpContext.Current.Items["CurrentException"] as InvalidLicenseException;
			if (ex != null)
				litErrorInfo.Text = Util.HtmlEncode(ex.Message);
			else
				litErrorInfo.Text = Util.HtmlEncode(new InvalidLicenseException().Message);
		}
	}
}