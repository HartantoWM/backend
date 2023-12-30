// import express
const express = require('express');

// Membuat object express
const app = express();

// Menggunakan middleware
app.use(express.json());
app.use(express.urlencoded({extended: true}));

// route definision
const router = require("./routes/api.js");
app.use(router);

// Mendefinisikan port.
app.listen(3000, () => {
    console.log("Server running at http://localhost:3000");
});