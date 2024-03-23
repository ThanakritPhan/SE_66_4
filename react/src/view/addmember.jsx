import Navbar from "../component/Navber";
import './addmember.css';
import { useState } from "react";
import axios from "axios";
import { toast } from "react-toastify";
//import Alert from '@mui/material/Alert';
//import Alert from '@mui/material/Alert';
// import axiosClient from "../axios.js";
// import { useNavigate } from "react-router-dom";
// import { useForm } from "react-hook-form";
// import { Label } from "@radix-ui/react-label";

const notify = () => {
  toast.success("addmember successful 🛒" ,{
    position: "top-center",
    autoClose: 5000,
    hideProgressBar: false,
    closeOnClick:true,
    pauseOnHover: true,
    draggable: true,
    progress: undefined,
  });
  toast.error('🦄error so easy!', {
    position: "top-center",
    autoClose: 5000,
    hideProgressBar: false,
    closeOnClick: true,
    pauseOnHover: true,
    draggable: true,
    progress: undefined,
    theme: "light",
    transition: Bounce,
    });
}

function addmember() {
  // const [name,setName] = useState('');
  // const [surname,setSurname] = useState('');
  // const [address,setAddress] = useState('');
  // const [userID,setUserID] = useState('');
  // const [password,setPasswors] = useState('');
  // const [uplineID,setUplineID] = useState('');
  // const [error,setError] = useState({__html: ''})
  // const onSubmit = (event) => {
  //   event.preventDefault();
  //   setError({__html: ''})

  //   axiosClient.post('/addmember',{
  //     name,
  //     surname,
  //     address,
  //     userID,
  //     password,
  //     uplineID

  //   })
  //   .then(({data}) => {
  //     console.log(data);
  //   })
  //   .catch((error) => {
  //     console.log(error);
  //   });
  // }
  const [userField, setUserField] = useState({
    name: '',
    surname: '',
    address: '',
    userID: '',
    password: '',
    uplineID: ''

  });
  const changeUserFieldHandler = (e) => {
    setUserField({
        ...userField,
        [e.target.name]: e.target.value
    });
    console.log(userField);
  }
  const [loading,setLoading]=useState()
 
    const onSubmitChange = async (e) => {
        e.preventDefault();
        try {
            const responce= await axios.post("http://127.0.0.1:8000/api/addmember", userField);
            console.log(responce);
            setLoading(true);
        } catch (err) {
            
            console.log(err);
        }
    }
    if(loading){
      notify();
    }
  // //const navigate = useNavigate();
  // const [error, setError] = useState({});
  // const handleInput = (event) => {
  //   setValues(prev => ({...prev, [event.target.name]: [event.target.value]
  //   }))
  // }
  // const handleSubmit = (event) => {
  //   event.preventDefault();
  //   setError(Validation(values));
  //   if(error.name === "" && error.surname === "" && 
  //      error.address === "" && error.userID === "" && 
  //      error.password === "" && error.uplineID === ""){
  //       axios .post('http://localhost:3001/addmember',values)
  //       .then(res => {
  //         console.log(res),
  //         navigate('/');
  //       })
  //       .catch(err => console.log(err));
  //      }
  // }
  

  return(
    <div>
      <Navbar/>
      <h1>ADD MEMBER</h1>
      <div className="all-addform" >
      {/* onSubmit={(event) => onSubmit(event)} */}
      
      <form className="form-add" >
        <div className="name">
        <label>Firstname<br/></label>
        <input type="text" 
                placeholder="Enter Firstname" 
                name="name"
                onChange={e => changeUserFieldHandler(e)}
                // ...register("name",{
                //   required: true,
                //  // pattern: 
                // })
                ></input>
                {/* {error.name && <span className="text-danger">{error.name}</span>} */}
                </div>

        <div className="surname">
        <label>Surname<br/></label>
        <input type="text" 
                placeholder="Enter Surname" 
                name="surname"
                onChange={e => changeUserFieldHandler(e)}
                // {...register("Surname",{
                //   required: true,
                //   pattern: /^[^@ ]+@[^@ ]+\.[^@ .]{2,}$/
                // })}
                ></input>
                {/* {error.surname && <span className="text-danger">{error.surname}</span>} */}
                </div>

        <div className="address">
        <label>Address<br/></label>
        <input type="text" 
                placeholder="Enter Address" 
                name="address"
                onChange={e => changeUserFieldHandler(e)}
                // {...register("address",{
                //   required: true,
                //   pattern: /^[^@ ]+@[^@ ]+\.[^@ .]{2,}$/
                // })}
                ></input>
                {/* {error.address && <span className="text-danger">{error.address}</span>} */}
                </div>
                  
        <div className="userID">
        <label>UserID<br/></label>
        <input type="text" 
                placeholder="Enter UserID" 
                name="userID"
                onChange={e => changeUserFieldHandler(e)}
                // {...register("userID",{
                //   required: true,
                //   pattern: /^[^@ ]+@[^@ ]+\.[^@ .]{2,}$/
                // })}
                ></input>
                {/* {error.userID && <span className="text-danger">{error.userID}</span>} */}
                </div>
        <div className="password">
        <label>Password<br/></label>
        <input type="text" 
                placeholder="Enter Password" 
                name="password"
                onChange={e => changeUserFieldHandler(e)}
                // {...register("password",{
                //   required: true,
                //   pattern: /^[^@ ]+@[^@ ]+\.[^@ .]{2,}$/
                // })}
                ></input>
                {/* {error.password && <span className="text-danger">{error.password}</span>} */}
                </div>

        <div className="uplineID">
        <label>UpLine<br/></label>
        <input type="text" 
                placeholder="Enter memberID" 
                name="uplineID"
                onChange={e => changeUserFieldHandler(e)}
                // {...register("uplineID",{
                //   required: true,
                //   pattern: /^[^@ ]+@[^@ ]+\.[^@ .]{2,}$/
                // })}
                ></input>
                {/* {error.uplineID && <span className="text-danger">{error.uplineID}</span>} */}
                </div>
          <button name="submit" type="submit" className="submit" onClick={(e => onSubmitChange(e))} >SUBMIT</button>
        
      </form>
      </div>

  {/* </ToastContainer
      position="top-center"
      autoClose={5000}
      hideProgressBar={false}
      newestOnTop={false}
      closeOnClick
      rtl={false}
      pauseOnFocusLoss
      draggable
      pauseOnHover
      theme="light"
      transition: Bounce, > */}
         
    </div>

    );
}
export default addmember
  
