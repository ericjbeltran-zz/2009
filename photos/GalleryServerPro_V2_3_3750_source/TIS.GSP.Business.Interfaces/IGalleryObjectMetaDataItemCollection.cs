using System;

namespace GalleryServerPro.Business.Interfaces
{
	/// <summary>
	/// A collection of <see cref="IGalleryObjectMetadataItem" /> objects.
	/// </summary>
	public interface IGalleryObjectMetadataItemCollection : System.Collections.Generic.ICollection<IGalleryObjectMetadataItem>
	{
		/// <summary>
		/// Sort the objects in this collection based on the Description property.
		/// </summary>
		void Sort();

		/// <summary>
		/// Determines whether the <paramref name="galleryObjectMetadataItem"/> is already a member of the collection. An object is considered a member
		/// of the collection if the value of its <see cref="IGalleryObjectMetadataItem.MetadataItemName"/> property matches one in the existing collection.
		/// </summary>
		/// <param name="galleryObjectMetadataItem">An <see cref="IGalleryObjectMetadataItem"/> to determine whether it is a member of the current collection.</param>
		/// <returns>Returns <c>true</c> if <paramref name="galleryObjectMetadataItem"/> is a member of the current collection;
		/// otherwise returns <c>false</c>.
		/// </returns>
		new bool Contains(IGalleryObjectMetadataItem galleryObjectMetadataItem);

		/// <summary>
		/// Create a new <see cref="IGalleryObjectMetadataItem" /> item from the specified parameters and add it to the collection. Return a 
		/// reference to the new item.
		/// </summary>
		/// <param name="mediaObjectMetadataId">A value that uniquely indentifies this metadata item.</param>
		/// <param name="metadataItemName">The name of this metadata item.</param>
		/// <param name="description">The description of the metadata item (e.g. "Exposure time", "Camera model")</param>
		/// <param name="value">The value of the metadata item (e.g. "F5.7", "1/500 sec.").</param>
		/// <param name="hasChanges">A value indicating whether this metadata item has changes that have not been persisted to the database.</param>
		/// <returns>Returns a reference to the new item.</returns>
		IGalleryObjectMetadataItem AddNew(int mediaObjectMetadataId, GalleryServerPro.Business.Metadata.FormattedMetadataItemName metadataItemName, string description, string value, bool hasChanges);

		/// <summary>
		/// Adds the metadata items to the current collection.
		/// </summary>
		/// <param name="galleryObjectMetadataItems">The metadata items to add to the collection.</param>
		void AddRange(IGalleryObjectMetadataItemCollection galleryObjectMetadataItems);

		/// <summary>
		/// Gets a reference to the <see cref="IGalleryObjectMetadataItem" /> object at the specified index position.
		/// </summary>
		/// <param name="indexPosition">An integer specifying the position of the object within this collection to
		/// return. Zero returns the first item.</param>
		/// <returns>Returns a reference to the <see cref="IGalleryObjectMetadataItem" /> object at the specified index position.</returns>
		IGalleryObjectMetadataItem this[Int32 indexPosition]
		{
			get;
			set;
		}

		/// <summary>
		/// Searches for the specified object and returns the zero-based index of the first occurrence within the collection.  
		/// </summary>
		/// <param name="galleryObjectMetadataItem">The <paramref name="galleryObjectMetadataItem"/> object to locate in the collection. The value can be a null 
		/// reference (Nothing in Visual Basic).</param>
		/// <returns>The zero-based index of the first occurrence of <paramref name="galleryObjectMetadataItem"/> within the collection, if found; 
		/// otherwise, �1. </returns>
		Int32 IndexOf(IGalleryObjectMetadataItem galleryObjectMetadataItem);

		/// <summary>
		/// Gets the <see cref="IGalleryObjectMetadataItem" /> object that matches the specified 
		/// <see cref="GalleryServerPro.Business.Metadata.FormattedMetadataItemName" />. The <paramref name="metadataItem"/>
		/// parameter remains null if no matching object is in the collection.
		/// </summary>
		/// <param name="metadataName">The <see cref="GalleryServerPro.Business.Metadata.FormattedMetadataItemName" /> of the 
		/// <see cref="IGalleryObjectMetadataItem" /> to get.</param>
		/// <param name="metadataItem">When this method returns, contains the <see cref="IGalleryObjectMetadataItem" /> associated with the 
		/// specified <see cref="GalleryServerPro.Business.Metadata.FormattedMetadataItemName" />, if the key is found; otherwise, the 
		/// parameter remains null. This parameter is passed uninitialized.</param>
		/// <returns>Returns true if the <see cref="IGalleryObjectMetadataItemCollection" /> contains an element with the specified 
		/// <see cref="GalleryServerPro.Business.Metadata.FormattedMetadataItemName" />; otherwise, false.</returns>
		bool TryGetMetadataItem(GalleryServerPro.Business.Metadata.FormattedMetadataItemName metadataName, out IGalleryObjectMetadataItem metadataItem);

		/// <summary>
		/// Gets or sets a value indicating whether all metadata items in the collection should be replaced with the current
		/// metadata in the image file. This property is calculated based on the <see cref="IGalleryObjectMetadataItem.ExtractFromFileOnSave"/>
		/// property on each metadata item in the collection. Setting this property causes the
		/// <see cref="IGalleryObjectMetadataItem.ExtractFromFileOnSave"/>  property to be set to the specified value for *every* metadata item in the collection.
		/// If the collection is empty, then the value is stored in a private class field. Note that since new items added to
		/// the collection have their <see cref="IGalleryObjectMetadataItem.ExtractFromFileOnSave"/> property set to false, if you set <see cref="RegenerateAllOnSave" /> = "true" on
		/// an empty collection, then add one or more items, this property will subsequently return false. This property is
		/// ignored for <see cref="IAlbum" /> objects.
		/// </summary>
		/// <value>
		/// 	<c>true</c> if <see cref="IGalleryObjectMetadataItem.ExtractFromFileOnSave"/>  =  true for *every* metadata item in 
		/// the collection; otherwise, <c>false</c>.
		/// </value>
		bool RegenerateAllOnSave { get; set; }

		/// <summary>
		/// Get a list of items whose metadata must be updated with the metadata currently in the media object's file. All 
		/// IGalleryObjectMetadataItem whose ExtractFromFileOnSave property are true are returned. This is called during a 
		/// save operation to indicate which metadata items must be updated. Guaranteed to not return null. If no items
		/// are found, an empty collection is returned.
		/// </summary>
		/// <returns>Returns a list of items whose metadata must be updated with the metadata currently in the media object's file.</returns>
		IGalleryObjectMetadataItemCollection GetItemsToUpdate();

		/// <summary>
		/// Get a list of items whose metadata must be persisted to the data store, either because it has been added or because
		/// it has been modified. All IGalleryObjectMetadataItem whose HasChanges property are true are returned. This is called during a 
		/// save operation to indicate which metadata items must be saved. Guaranteed to not return null. If no items
		/// are found, an empty collection is returned.
		/// </summary>
		/// <returns>Returns a list of items whose metadata must be updated with the metadata currently in the media object's file.</returns>
		IGalleryObjectMetadataItemCollection GetItemsToSave();

		/// <summary>
		/// Perform a deep copy of this metadata collection.
		/// </summary>
		/// <returns>Returns a deep copy of this metadata collection.</returns>
		IGalleryObjectMetadataItemCollection Copy();
	}
}
