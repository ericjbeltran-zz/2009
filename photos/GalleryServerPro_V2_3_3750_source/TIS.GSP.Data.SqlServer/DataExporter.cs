using System.Data;
using System.Data.SqlClient;

namespace GalleryServerPro.Data.SqlServer
{
	internal static partial class DataUtility
	{
		internal static string ExportData(bool exportMembershipData, bool exportGalleryData)
		{
			DataSet ds = new DataSet("GalleryServerData");

			System.Reflection.Assembly asm = System.Reflection.Assembly.GetExecutingAssembly();
			using (System.IO.Stream stream = asm.GetManifestResourceStream("GalleryServerPro.Data.SqlServer.GalleryServerProSchema.xml"))
			{
				ds.ReadXmlSchema(stream);
			}

			using (SqlConnection cn = SqlDataProvider.GetDbConnection())
			{
				if (cn.State == ConnectionState.Closed)
					cn.Open();

				if (exportMembershipData)
				{
					string[] aspnet_TableNames = new string[]
					                             	{
					                             		"aspnet_Applications", "aspnet_Membership", "aspnet_Profile", "aspnet_Roles",
					                             		"aspnet_Users", "aspnet_UsersInRoles"
					                             	};
					using (SqlCommand cmd = new SqlCommand(Util.GetSqlName("gs_ExportMembership"), cn))
					{
						cmd.CommandType = CommandType.StoredProcedure;

						using (IDataReader dr = cmd.ExecuteReader())
						{
							ds.Load(dr, LoadOption.OverwriteChanges, aspnet_TableNames);
						}
					}
				}

				if (exportGalleryData)
				{
					string[] gs_TableNames = new string[]
					                         	{
					                         		"gs_Album", "gs_Gallery", "gs_MediaObject", "gs_MediaObjectMetadata", "gs_Role",
					                         		"gs_Role_Album", "gs_AppError", "gs_SchemaVersion"
					                         	};
					using (SqlCommand cmd = new SqlCommand(Util.GetSqlName("gs_ExportGalleryData"), cn))
					{
						cmd.CommandType = CommandType.StoredProcedure;

						using (IDataReader dr = cmd.ExecuteReader())
						{
							ds.Load(dr, LoadOption.OverwriteChanges, gs_TableNames);
						}
					}
				}

				using (System.IO.StringWriter sw = new System.IO.StringWriter())
				{
					ds.WriteXml(sw, XmlWriteMode.WriteSchema);
					//ds.WriteXmlSchema(filePath); // Use to create new schema file after a database change

					return sw.ToString();
				}
			}
		}
	}
}
