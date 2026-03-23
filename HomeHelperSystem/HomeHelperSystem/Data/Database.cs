namespace HomeHelperSystem.Data
{
    using System.Data.SqlClient;

    public class Database
    {
        private string connectionString = "Server=(localdb)\\MSSQLLocalDB;Database=HomeHelperDB;Trusted_Connection=True;";

        public SqlConnection GetConnection()
        {
            return new SqlConnection(connectionString);
        }
    }
}
