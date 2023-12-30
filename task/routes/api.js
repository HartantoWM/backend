// Import Student Controller
const StudentController = require("../controllers/StudentController");

// import express
const express = require("express");

// make an object router
const router = express.Router();

// make an object routing
router.get("/", (req, res) => {
  res.send("Hello Tanto");
});

router.get("/students", StudentController.index);
router.post("/students", StudentController.store);
router.put("/students/:id", StudentController.update);
router.delete("/students/:id", StudentController.destroy);

// Export router
module.exports = router;