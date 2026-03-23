using Microsoft.AspNetCore.Mvc;
using Microsoft.Data.SqlClient;
using System.Collections.Generic;
using System.IO;
using Microsoft.AspNetCore.Http;
using System;

public class TaskModel
{
    public string Name { get; set; }
    public string Description { get; set; }
    public DateTime Deadline { get; set; }
    public decimal Budget { get; set; }
    public string Category { get; set; }
}

public class TaskController : Controller
{
    string conn = "Server=(localdb)\\MSSQLLocalDB;Database=HomeHelperDB;Trusted_Connection=True;";

    // Създаване на задача
    public IActionResult Create()
    {
        return View();
    }

    [HttpPost]
    public IActionResult Create(TaskModel task)
    {
        using (SqlConnection connection = new SqlConnection(conn))
        {
            connection.Open();
            string query = "INSERT INTO Tasks (Name, Description, Deadline, Budget, Category, Status, ClientId) " +
                           "VALUES(@n,@d,@dl,@b,@c,'Pending',1)";
            using (SqlCommand cmd = new SqlCommand(query, connection))
            {
                cmd.Parameters.AddWithValue("@n", task.Name);
                cmd.Parameters.AddWithValue("@d", task.Description);
                cmd.Parameters.AddWithValue("@dl", task.Deadline);
                cmd.Parameters.AddWithValue("@b", task.Budget);
                cmd.Parameters.AddWithValue("@c", task.Category);
                cmd.ExecuteNonQuery();
            }
        }
        return RedirectToAction("Index");
    }

    // Списък със задачи с търсене
    public IActionResult Index(string search)
    {
        List<TaskModel> tasks = new List<TaskModel>();
        using (SqlConnection connection = new SqlConnection(conn))
        {
            connection.Open();
            string query = "SELECT * FROM Tasks WHERE Name LIKE @search";
            using (SqlCommand cmd = new SqlCommand(query, connection))
            {
                cmd.Parameters.AddWithValue("@search", "%" + (search ?? "") + "%");
                var reader = cmd.ExecuteReader();
                while (reader.Read())
                {
                    tasks.Add(new TaskModel
                    {
                        Name = reader["Name"].ToString(),
                        Description = reader["Description"].ToString(),
                        Deadline = Convert.ToDateTime(reader["Deadline"]),
                        Budget = Convert.ToDecimal(reader["Budget"]),
                        Category = reader["Category"].ToString()
                    });
                }
            }
        }
        return View(tasks);
    }

    // Upload на снимка
    [HttpPost]
    public IActionResult Upload(IFormFile file)
    {
        var path = Path.Combine("wwwroot/images", file.FileName);
        using (var stream = new FileStream(path, FileMode.Create))
        {
            file.CopyTo(stream);
        }
        return RedirectToAction("Index");
    }
}