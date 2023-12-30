// import model Student
const Student = require('../models/Student');

class StudentController {
  // menambahkan keyword async memberitahu proses asynchronous
  async index(req, res) {
    // memanggil method static all dengan async await
    const students = await Student.all();

    const data = {
      message: "Menampilkan data student",
      data: students
    }

    res.json(data);
  }

  async store(req, res) {
    /**
     * TODO 2: memanggil method create.
     * Method create mengembalikan data yang baru diinsert.
     * Mengembalikan response dalam bentuk json.
     */

    const { nama, nim, email, jurusan } = req.body
    const students = await Student.create(req.body);
    const data = {
      message: "Menambahkan data student",
      data: students
    };

    res.status(201).json(data);
  }

  update(req, res) {
    const { id } = req.params;
    const { nama } = req.body;

    const data = {
      message: `Mengedit student id ${id}, nama ${nama}`,
      data: [],
    };

    res.json({ data: "update is not implemented yet" });
  }

  destroy(req, res) {
    const { id } = req.params;

    const data = {
      message: `Menghapus student id ${id}`,
      data: [],
    };

    res.json({ data: "update is not implemented yet" });
  }
}

// Membuat object StudentController
const object = new StudentController();

// Export object StudentController
module.exports = object;