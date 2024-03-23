import React from 'react';
import ReactDOM from 'react-dom/client';
import Home from './Home';
import './index.css';
import { createBrowserRouter,
         RouterProvider,
         Route,} from 'react-router-dom'; 
import Addmember from './view/addmember';
//import { Switch } from '@headlessui/react';
// import addmember from './view/addmember';
// import { Switch } from '@headlessui/react';
// import Route from 'vendor/tightenco/ziggy/src/js/Route';

const router = createBrowserRouter([
  {
    path: "/",
    element: <Home/>
  },
  {
    path: "Addmember",
    element: <Addmember/>
  },
]);


ReactDOM.createRoot(document.getElementById('root')).render(

  <RouterProvider router={router}/>
  // <React.StrictMode>
  //     <Home/>
  // </React.StrictMode>
);
