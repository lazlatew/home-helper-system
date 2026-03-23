using Microsoft.AspNetCore.Mvc;
using Microsoft.Data.SqlClient;
using Microsoft.AspNetCore.Http; // за session

public class AccountController : Controller
{
    string conn = "Server=(localdb)\\MSSQLLocalDB;Database=HomeHelperDB;Trusted_Connection=True;";

    // Показва регистрацията
    public IActionResult Register()
    {
        return View();
    }

    [HttpPost]
    public IActionResult Register(string Username, string Password, string FirstName, string LastName)
    {
        using (SqlConnection connection = new SqlConnection(conn))
        {
            connection.Open();
            string query = "INSERT INTO Users VALUES(@u,@p,@f,@l,'Client')";
            using (SqlCommand cmd = new SqlCommand(query, connection))
            {
                cmd.Parameters.AddWithValue("@u", Username);
                cmd.Parameters.AddWithValue("@p", Password);
                cmd.Parameters.AddWithValue("@f", FirstName);
                cmd.Parameters.AddWithValue("@l", LastName);
                cmd.ExecuteNonQuery();
            }
        }
        return Content("УСПЕШНА РЕГИСТРАЦИЯ!");
    }

    // Показва login формата
    public IActionResult Login()
    {
        return View();
    }

    [HttpPost]
    public IActionResult Login(string username, string password)
    {
        using (SqlConnection connection = new SqlConnection(conn))
        {
            connection.Open();
            string query = "SELECT * FROM Users WHERE Username=@u AND Password=@p";
            using (SqlCommand cmd = new SqlCommand(query, connection))
            {
                cmd.Parameters.AddWithValue("@u", username);
                cmd.Parameters.AddWithValue("@p", password);
                var reader = cmd.ExecuteReader();
                if (reader.Read())
                {
                    HttpContext.Session.SetString("Username", username);
                    HttpContext.Session.SetString("Role", reader["Role"].ToString());
                    return RedirectToAction("Index", "Task");
                }
                else
                {
                    ViewBag.Error = "Невалидни данни!";
                    return View();
                }
            }
        }
    }
}