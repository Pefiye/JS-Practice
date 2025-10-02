import mysql from "mysql2"
import express from "express"

const app = express()
const port = 3001

app.use(express.json())
app.use(express.static("public"))
const db = mysql.createConnection({host: "localhost", user: "root", password:"", database:"node_food2"})

db.connect (err => {
    if(err){console.error(err)}else{console.log("Connected Succesfully")}
})

// ========================================================================================================================================================

app.get("/api", (req, res) => {
    db.query("SELECT * from items", (err, results) => {
        if (err) {console.error("Error: ", err)}
        res.json(results)
    })
})

app.post("/add", (req, res) => {
    const {nama, stok, tipe} = req.body

    db.query("SELECT * from items where name=?", [nama], (err, row) =>{
        if (err){return res.status(400).send({"message":`Error: ${err}`})}
        if (row.length > 0){return res.status(500).send({"message":"Data Sudah Ada"})}
        else {

            db.query("INSERT INTO items (name, type, stock) VALUES (?,?,?)",[nama, tipe, stok], (err) => {
                if (err){return res.status(400).send({"message":`Error: ${err}`})}
                res.send({"message":"Data Inserted Succesfully"})
            });

        }
    })
})

app.get("/api/:name", (req, res) => {
    const name = req.params.name

    db.query("SELECT * from items where name=?", [name], (err, result) =>{
        if (err){return res.status(400).send({"message":`Error: ${err}`})}
        res.json(result)
    })
})

app.put("/update", (req, res) => {
    const {oldname, nama, stok, tipe} = req.body

    db.query("UPDATE `items` SET `name`=?,`type`=?,`stock`=? WHERE name=?", [nama, tipe, stok, oldname], (err) => {
        if (err){res.status(500).send({"message":`Error: ${err}`})}
    })
})


app.delete("/delete/:name", (req, res) => {
    const name = req.params.name

    db.query("DELETE from items WHERE name=?", [name], (err) => {
        if (err){return res.status(400).send({"message":`Error: ${err}`})}
    })
})


// ========================================================================================================================================================

app.listen(port, () => {
    console.log("Connected: ", port)
})