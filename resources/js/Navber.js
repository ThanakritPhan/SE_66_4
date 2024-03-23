import React, { useState, useEffect } from "react";
import '../css/nav.css';
import { GoChevronDown } from "react-icons/go";

function Navbar() {
 
    const [scroll, setScroll] = useState(false);
    useEffect(() => {
      window.addEventListener("scroll", () => {
        setScroll(window.scrollY > 10);
      });
    });
  return (
    <header className={`headerMain ${scroll ? "sticky" : ""}`}>
    <nav class="top-bar">
      <div class="logo">
        <img src ="{{ URL('images/logo.png') }}" alt="logo"></img>
      </div>
    </nav>
    <nav >
        <div class="second-nav">
        
        <li><a class="sidenav-link" href="#"><b>Member</b></a></li>
        </div>
        <div className="dropdown">
        <li><a class="changerole" ><b>change role</b> <GoChevronDown/></a></li>
       
        </div>
       
    </nav>
    </header>
    
      
  );
}
export default Navbar;