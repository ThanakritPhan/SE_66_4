const express = require("express");
const mysql = require('mysql');
const cors = require('cors');

const app = express();
app.use(cors());
app.use(express.json());

const db = mysql.createConnection({
    host: "localhost",
    user: "root",
    password: "",
    database: "db23_105"
})

app.post('/addmember',(req , res )=> {
    const sql = "INSERT INTO `member` (`memberID`, `Name`, `Surname`, `Address`, `rank`, `loginID`, `loginPass`, `PV`, `upline`) VALUES (?)";
    const values = [
        req.body.memberID='null',
        req.body.name,
        req.body.surname,
        req.body.address,
        req.body.rank = '1',
        req.body.userID,
        req.body.password,
        req.body.pv = '0',
        req.body.uplineID,
    ]
db.query(sql, [values], (err , data) => {
        if(err) {
            return res.json("Error");
        }
        return res.json(data);
    })

})

app.listen(3001,() => {
    console.log("listening");
})