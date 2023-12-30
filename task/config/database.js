// import mysql
const mysql = require("mysql");

// import dotenv dan jalankan method config
require("dotenv").config();

// update konfigurasi database dari file .env
const db = mysql.createConnection({
  host: process.env.DB_HOST,
  user: process.env.DB_USERNAME,
  password: process.env.DB_PASSWORD,
  database: process.env.DB_DATABASE,
});

/**
 * Connect ke database menggunakan method connect.
 * Menerima parameter callback
 */
db.connect(function (err) {
  if (err) {
    console.log(`Koneksi error: ${err}`);
    return;
  } else {
    console.log("Koneksi berhasil");
    return;
  }
});

module.exports = db;