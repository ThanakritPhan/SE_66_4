import React, { useState, useEffect } from "react";
import './nav.css';
import logo from "./logo.png";
import { GoChevronDown } from "react-icons/go";
import Home from "../Home";

function Navbar() {
    const [scroll, setScroll] = useState(false);
    useEffect(() => {
      window.addEventListener("scroll", () => {
        setScroll(window.scrollY > 10);
      });
    });
  return (
    <header className={`headerMain ${scroll ? "sticky" : ""}`}>
    <nav className="top-bar">
      <div className="logo">
        <img src ={logo} alt="logo"></img>
      </div>
    </nav>
    <nav >
        <div className="second-nav">
        {/* <li><a class = "backicon" href="#"><GoArrowLeft/></a></li> */}
        <li><a className="sidenav-link" href="/"><b>Member</b></a></li>
        </div>
        <div className="dropdown">
        <li><a className="changerole" ><b>change role</b> <GoChevronDown/></a></li>
        </div>
    </nav>
    </header>
  );
}
export default Navbar;