<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meto name="csrf-token" content="{{csrf_token()}}" />
<title>HomeMember</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<style>

@import url('https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap');

*{
    margin: 0;
    padding:0 ; 
    font-family: "Outfit", sans-serif;
}

  #navbar {
  position: fixed;
  top: 0px;
  width: 100%;
  display: block;
  transition: top 0.3s;
}

.sticky {
    position: fixed;
    top: 0;
    width: 100%;
    animation-duration: 0.5s;
    animation-name: fadeInDown;
    animation-timing-function: ease-out;
  }
.top-bar {
    display: flex;
    height: 106px;
    justify-content: space-between;
    padding: 10px 25px;
    background: #25393C;
}
.logo{
    display: flex;
}
.logo img{
    display: flex;
    margin-right: 10px;
}
nav{
    background: rgb(201, 206, 209);
    height: 71px;
    padding: 2px 25px;
    display: flex;
    align-items: center;
    position: relative;
}
nav .sticky {
    position: fixed;
    top: 0;
    width: 100%;
    
  }
nav a{
    color: #44576D ;
}
nav a:hover{
    color: #112b48;
}
nav .second-nav{
    list-style: none;
    display: flex;
    align-items: center;
    margin-left: 80px;
}
.second-nav li{
    padding: 15px 10px;
    font-size: 20px;
    
}
nav .dropdown{
    list-style: none;
    display: flex;
    align-items: center;
    margin-left: 80px;
}
.dropdown li{
    padding: 15px 10px;
    font-size: 20px;
}


.table-responsive {
    margin:  auto;
    display: flex;
}
.table-wrapper {
    min-width: 1000px;
    background: #ffffff;
    padding: auto;
    box-shadow: 0 1px 1px rgba(0,0,0,.05);
    margin: auto;
}
.table-title {
    padding-bottom: 5px;
    display: auto;
    min-width: 50%;
}
.addmember {
    right: 50px;
    text-align: center;
    padding: 10px;
    padding-right: 60%;
}
.addmember-button {
    background: #ffffff;
    border-radius: 20px;
    border-color: #a5a4a4;
}
.addmember-button:hover {
    background: #cfcfcf;
}
.search-box {
    display: auto;
    margin-right:18% ;
    margin-left:16%;
    padding-bottom: 10px;
} 

.search-box input  {
    height: 40px;
    border-radius: 20px;
    border-color: #e7f6e9;
    box-shadow: none;
    margin-right: 30px;
    
}
.search-box input:focus {
    border-color: #3FBAE4;
    padding-right: 30px;
}
.submitsearch{
    background-color: #a4dcbd;
    border-radius: 20px;
}
table.table tr th, table.table tr td {
    border-color: #ffffff;
    display: auto;
}
table.table-striped tbody tr:nth-of-type(odd) {
    background: #e1f7e1;
}
table.table-striped.table-hover tbody tr:hover {
    background: #ffffff;
}
table.table td:last-child {
    display: auto;
}
table.table td a.edit {
    color: #15734f;
}
table.table td a.delete {
    color: #E34724;
}
table.table td i {
    font-size: 20px;
}    

</style>

</head>
<body>
    <script>
        window.onscroll = function() {scrollFunction()};
    
       function scrollFunction() {
         if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
           document.getElementById("navbar").style.top = "-107px";
         } else {
           document.getElementById("navbar").style.top = "0px";
         }
       }
       </script>
       
      <div id="navbar">

      <nav class="top-bar">
        <div class="logo">
          <img  src ="images/logo.png" alt="logo"></img>
        </div>
       </nav>
    
       <nav>
          <div class="second-nav">
          <li><a class="sidenav-link" href="{{ url('HomeMembers') }}"><b>Member</b></a></li>
          </div>
          <div class="dropdown">
          <li><a class="changerole" ><b>change role</b>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 -5 18 18">
              <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
            </svg>
          </a></li>
          </div> 
       </nav>
      </div>
      <h><br/></h>
      <h><br/></h>
      <h><br/></h>
      <h><br/></h>
      <h><br/></h>
      <h><br/></h>
      <h><br/></h>
      <div action="/addmember"  class="addmember" >
        <button onclick="location.href='{{ url('HomeMembers/addmember') }}'" class="addmember-button" >addmember</button>
    </div>
    <form method="get" action="/search">
    <div class="search-box">
        {{-- <i class="material-icons">&#xE8B6;</i></input> --}}
        <input type="text" name="search" id="search" class="form-control" placeholder="Search&hellip;" >
        <button type="submitsearch" class="submitsearch">Search</button>
    </div>
    </form>


<div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <table id="myDataTable" class="table table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>MemberID </i></th>
                        <th>UserID</th>
                        <th>Name </i></th>
                        <th>Surname</th>
                        <th>Address</i></th>
                        <th>rank</th>
                    </tr>
                </thead>
                 <tbody id="tbody" name="tbody">
                    
                </tbody> 
                  @if($member -> count()> 0) 
                     <h1>total data: {{$member->count()}}</h1>
                  @foreach ($member as $member)
                      
                     <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$member->memberID}}</td>
                        <td>{{$member->loginID}}</td>
                        <td>{{$member->Name}}</td>
                        <td>{{$member->Surname}}</td>
                        <td>{{$member->Address}}</td>
                        <td>{{$member->rankName}}</td>
                        <td>
                            
                            <a href="{{url('HomeMembers/'.$member->memberID.'/update')}}" class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                            <a href="{{url('HomeMembers/'.$member->memberID.'/delete')}}" onclick="return confirm('Are you sure to delete {{.$member->memberID.' '.$member->Name.'..}}  ')" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                        </td>
                    </tr> 
                  @endforeach
                  @else
                     <tr>
                       <td class="text-center" colspan="S">Members Data not found </td>
                     </tr>
                  @endif   
                
            </table>
            
        </div>
    </div>  
</div>




</body>
</html>