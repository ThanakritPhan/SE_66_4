
import Navbar from './component/Navber';
import './index.css';
import React, { useEffect, useState } from 'react';
import axios from 'axios';
import addmember from './view/addmember';
import { Link } from 'react-router-dom';





function Home() {

      const [memberDate,setMemberData] = useState([]);
      //l./const [searchResults, setSearchResults] = useState([]);
      const [columns,setColumns] = useState([]);
      const [record,setRecords] = useState([]);

      useEffect(() => {
        fetchData();
      },[])

      const fetchData = async () => {
        try {
          const result = await axios("http://127.0.0.1:8000/api/member");
          console.log(result.data.results);
          setMemberData(result.data.results);
          setRecords(result.data.results);
          setColumns(Object.keys(result.data[0]));
          

        }catch(err) {
          console.log("!!!!!!something Wrong!!!!");

        }
      }
      
      function handleFilter(event) {

        const newData = record.filter( columns => {
          return  columns.Name.toLowerCase().includes(event.target.value.toLowerCase())
        })
        setMemberData(newData)
         
      }
    

  return (
    <div>
      <Navbar/>

      <div className='all'>

      <form className='form-home'>
      <input type="text" name="key" placeholder="Enter Name"  onChange={handleFilter} />
      <button className='refresh'>refresh</button><br/>
      <button className='button-17'><Link to="/addmember">NEW Member</Link></button>

    </form>

    
    <div className="container">
    
    <table className="Table">
        <thead>
        <tr>
          <th>#</th>
          <th>MemberID</th>
          <th>UserID</th>
          <th>Name</th>
          <th>Surname</th>
          <th>Address</th>
          <th>rank</th>
          <th>UPDATE</th>
          <th>DELETE</th>
        </tr>
        </thead>
         <tbody>
          {

                memberDate.map((member,i)=>{
                return (
                  <tr key={i}>
                    <td>{i + 1}</td>
                    <td>{member.memberID}</td>
                    <td>{member.loginID}</td>
                    <td>{member.Name}</td>
                    <td>{member.Surname}</td>
                    <td>{member.Address}</td>
                    <td>{member.rankName}</td>
                    <td>UPDATE</td>
                    <td>DELETE</td>
                  </tr>
                  )
              })
          
          }
        </tbody> 
      </table>
      </div>
      <h1>1</h1>
      <h1>1</h1>
      <h1>1</h1>
      <h1>1</h1>
      <h1>1</h1><h1>1</h1><h1>1</h1><h1>1</h1><h1>1</h1><h1>1</h1><h1>1</h1><h1>1</h1><h1>1</h1><h1>1</h1><h1>1</h1><h1>1</h1><h1>1</h1><h1>1</h1>
      </div>

      
</div>
  );
}

export default Home
