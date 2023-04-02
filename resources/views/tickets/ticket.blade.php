<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta http-equiv="Content-Type" content="text/html charset=UTF-8" />
      <style>
         @import url("https://fonts.googleapis.com/css2?family=Staatliches&display=swap");
         @import url("https://fonts.googleapis.com/css2?family=Nanum+Pen+Script&display=swap");
         * {
         margin: 0;
         padding: 0;
         box-sizing: border-box;
         }
         body,
         html {
         height: 100vh;
         display: grid;
         font-family: "Staatliches", cursive;
         background: rgb(17 28 92);
         color: black;
         font-size: 14px;
         letter-spacing: 0.1em;
         }
         .ticket {
         margin: auto;
         display: flex;
         background: white;
         box-shadow: rgba(0, 0, 0, 0.3) 0px 19px 38px, rgba(0, 0, 0, 0.22) 0px 15px 12px;
         }
         .left {
         display: flex;
         }
         .image {
         height: 250px;
         width: 250px;
         background-image: url("https://images.unsplash.com/photo-1550349269-4cc35562797e?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=3538&q=80");
         background-size: cover;
         background-position: 50% 50%;
         opacity: 0.85;
         }
         .background-image {
         height: 250px;
         width: 250px;
         float: left;
         z-index: -10;
         }
         .admit-one {
         position: absolute;
         color: darkgray;
         height: 250px;
         padding: 0 10px;
         letter-spacing: 0.15em;
         display: flex;
         text-align: center;
         justify-content: space-around;
         writing-mode: vertical-rl;
         transform: rotate(-180deg);
         }
         .admit-one span:nth-child(2) {
         color: white;
         font-weight: 700;
         }
         .left .ticket-number {
         height: 250px;
         width: 250px;
         display: flex;
         justify-content: flex-end;
         align-items: flex-end;
         padding: 5px;
         color: #fafafa;
         position: absolute;
         }
         .ticket-info {
         padding: 10px 30px;
         display: flex;
         flex-direction: column;
         text-align: center;
         justify-content: space-between;
         align-items: center;
         }
         .date {
         border-top: 1px solid gray;
         border-bottom: 1px solid gray;
         padding: 5px 0;
         font-weight: 700;
         display: flex;
         align-items: center;
         justify-content: space-around;
         }
         .date span {
         width: 100px;
         }
         .date span:first-child {
         text-align: left;
         }
         .date span:last-child {
         text-align: right;
         }
         .date .june-29 {
         color: rgb(17 28 92);
         font-size: 16px;
         }
         .show-name {
         font-size: 28px;
         font-family: "Nanum Pen Script", cursive;
         color: rgb(17 28 92);
         }
         .show-name h1 {
         font-size: 40px;
         font-weight: 700;
         letter-spacing: 0.1em;
         color: #4a437e;
         }
         .time {
         padding: 10px 0;
         color: #4a437e;
         text-align: center;
         display: flex;
         flex-direction: column;
         gap: 10px;
         font-weight: 700;
         }
         .time span {
         font-weight: 400;
         color: gray;
         }
         .left .time {
         font-size: 16px;
         }
         .location {
         display: flex;
         justify-content: space-around;
         align-items: center;
         width: 100%;
         padding-top: 8px;
         border-top: 1px solid gray;
         }
         .location .separator {
         font-size: 20px;
         }
         .right {
         width: 180px;
         border-left: 1px dashed #404040;
         }
         .right .admit-one {
         color: darkgray;
         }
         .right .admit-one span:nth-child(2) {
         color: gray;
         }
         .right .right-info-container {
         height: 250px;
         padding: 10px 10px 10px 35px;
         display: flex;
         flex-direction: column;
         justify-content: space-around;
         align-items: center;
         }
         .right .show-name h1 {
         font-size: 18px;
         }
         .barcode {
         height: 100px;
         }
         .barcode img {
         height: 100%;
         }
         .right .ticket-number {
         color: gray;
         }
      </style>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
   </head>
   <body class="antialiased">
      <div class="ticket">
         <div class="left">
            <div class="image">
               <img class="background-image" src="https://images.unsplash.com/photo-1550349269-4cc35562797e?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=3538&q=8">
               <p class="admit-one">
                  <span>ADMIT ONE</span>
                  <span>ADMIT ONE</span>
                  <span>ADMIT ONE</span>
               </p>
               <div class="ticket-number">
                  <p>
                     #f07e041f
                  </p>
               </div>
            </div>
            <div class="ticket-info">
               <p class="date">
                  <span>SATURDAY</span>
                  <span class="june-29">APRIL 15th</span>
                  <span>2023</span>
               </p>
               <div class="show-name">
                  <h1>Boro Afterprom</h1>
                  <h2>Kayley Retterer</h2>
               </div>
               <div class="time">
                  <p>11:00 PM <span>TO</span> 3:00 AM</p>
                  <p>DOORS <span>@</span> 10:30 PM</p>
               </div>
               <p class="location"><span>South Metro Ice Rink</span>
                  <span class="separator"><i class="far fa-smile"></i></span><span>Springboro, Ohio</span>
               </p>
            </div>
         </div>
         <div class="right">
            <p class="admit-one">
               <span>ADMIT ONE</span>
               <span>ADMIT ONE</span>
               <span>ADMIT ONE</span>
            </p>
            <div class="right-info-container">
               <div class="show-name">
                  <h1>Boro Afterprom</h1>
               </div>
               <div class="time">
                  <p>11:00 PM <span>TO</span> 3:00 AM</p>
                  <p>DOORS <span>@</span> 10:30 PM</p>
               </div>
               <div class="barcode">
                  <img src="https://external-preview.redd.it/cg8k976AV52mDvDb5jDVJABPrSZ3tpi1aXhPjgcDTbw.png?auto=webp&s=1c205ba303c1fa0370b813ea83b9e1bddb7215eb" alt="QR code">
               </div>
               <p class="ticket-number">
                  #f07e041f
               </p>
            </div>
         </div>
      </div>
   </body>
</html>