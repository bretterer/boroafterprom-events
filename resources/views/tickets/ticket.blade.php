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
         background-image: url("/images/fab50.png");
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
               <img class="background-image" src="/images/fab50.png">
               <p class="admit-one">
                  <span>ADMIT ONE</span>
                  <span>ADMIT ONE</span>
                  <span>ADMIT ONE</span>
               </p>
               <div class="ticket-number">
                  <p>
                     #{{ explode('-', $attendee->ticket->uuid)[0] }}
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
                  <h2>{{$attendee->first_name}} {{$attendee->last_name}}</h2>
               </div>
               <div class="time">
                  <p>11:00 PM <span>TO</span> 3:00 AM</p>
                  <p>DOORS <span>@</span> 11:00 PM</p>
               </div>
               <p class="location"><span>South Metro Ice</span>
                  <span class="separator"><i class="far fa-smile"></i></span><span>10561 Success Ln, 45458</span>
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
                  <p>DOORS <span>@</span> 11:00 PM</p>
               </div>
               <div class="barcode">
                  <!-- <img src="https://external-preview.redd.it/cg8k976AV52mDvDb5jDVJABPrSZ3tpi1aXhPjgcDTbw.png?auto=webp&s=1c205ba303c1fa0370b813ea83b9e1bddb7215eb" alt="QR code"> -->
                  <svg style="width:6.5rem; height:6.5rem; color:rgb(17 28 92);" version="1.0" viewBox="0 0 256 262" fill="currentColor" >
                    <path d="M204.9.4c-.2.2-6.1.9-13.1 1.5-25.3 2.3-48.8 9-71.7 20.6-20.9 10.5-36.7 22-54.7 39.9-17.7 17.8-30 35.1-40.9 58.1-12.7 26.6-19.3 52.8-21 83.2L2.9 214h26.9l.6-3.1c.3-1.7.6-5.5.6-8.3 0-17.2 7.2-45.9 16.6-66.4 1.9-4.1 3.4-7.5 3.4-7.8 0-.7 11.3-19 14.8-23.9 31.4-43.9 80.9-71.6 134.5-75.1l9.7-.6V0h-2.3c-1.3 0-2.6.2-2.8.4zM222 6.9c0 3.2.3 3.9 1.5 3.5 1.8-.7 4.5 1.2 4.5 3.2 0 .9-1.1 1.4-3 1.4-2.8 0-3 .3-3 3.6v3.7l10.8-.5c9-.4 11.6-.9 16.5-3.2 5.6-2.7 5.8-2.9 5.5-6.4-.3-3-.9-3.8-4.2-5.5-2.1-1.1-6.2-2.1-9-2.3-2.8-.1-8.4-.5-12.3-.9l-7.3-.7v4.1zm25.3 6.2c-.4.4-3.9 1.1-7.7 1.5-6.3.6-6.8.6-6.4-1.2.2-1.4 1.4-2 4.8-2.4 4.8-.6 10.7.7 9.3 2.1zM222 31v4h15v3.5c0 3.2.2 3.5 3 3.5s3-.3 3-3.5.2-3.5 3-3.5 3 .3 3 3.5.2 3.5 3 3.5h3V27h-33v4zm27.5 14.8c-.3.3-.5 1.4-.5 2.4 0 1.7-1.1 1.8-13.5 1.8H222v7h27v2.5c0 2.1.5 2.5 3 2.5h3v-7.9c0-7.6-.1-7.9-2.5-8.3-1.3-.3-2.7-.3-3 0z"/>
                    <path d="M187.5 46.9c-6.8 2.9-11.9 13.3-9.5 19.3 3.2 8 8.3 11.8 15.7 11.8 7.4 0 15.3-8.3 15.3-16 0-4.3-3.3-10.4-7.1-13.1-3.4-2.4-11-3.5-14.4-2zM222 73c0 7.8.1 8 2.4 8 2.1 0 2.5-.5 2.8-3.8.3-3.7.3-3.7 5.1-4l4.7-.3V77c0 3.9.1 4.1 2.8 3.8 2.3-.3 2.7-.8 3-4.1.3-3.4.6-3.7 3.3-3.7 2.7 0 2.9.2 2.9 4s.2 4 3 4h3V65h-33v8zm-92.5-1.7c-4.1 1.9-8.2 6.9-9.6 11.7-2.2 7.2 2.1 15.9 9.5 19.4 13.6 6.4 27.4-8.8 20.6-22.8-1.2-2.5-3.5-5.5-5.1-6.6-3.7-2.7-11.4-3.5-15.4-1.7zM222 90v4h7.5c5.7 0 7.5.3 7.5 1.4 0 1.4-4.2 2.6-9 2.6-5 0-6 .9-6 5.2 0 3.7.2 4 2.3 3.4 9.2-2.3 13.1-2.7 15.1-1.8 3.7 1.8 5.5 2.1 6.1 1.2.4-.6 1.7-1 3-1 4.5 0 6.5-3.5 6.5-11.7V86h-33v4zm26.8 5.7c.4 2.4-3.4 3.9-5.5 2.1-1.9-1.5-1.6-2.7 1-3.8 3-1.2 4.1-.7 4.5 1.7zM151.5 109c-4.9 2.2-9.5 3.9-10.1 4-4 .1-2.9 5 5.1 23.5.7 1.6 2.1 5.2 3 8 1 2.7 2.1 5.4 2.5 6 .4.5 1.5 3.2 2.5 6 .9 2.7 2.3 6.3 3.1 8 .7 1.6 4.1 10 7.4 18.5 3.4 8.5 7.6 19 9.3 23.3l3.1 7.7H209v-97h-26v18.2c0 10.6-.4 17.8-.9 17.2-.5-.5-5-10.8-10.1-22.9-5.1-12.1-9.8-22.5-10.4-23.2-.8-.9-3.2-.3-10.1 2.7zm70.5 5v4h14.7l.6 4.1c.7 5.2 2.3 6.9 6.7 7 5.9.2 6.8 0 9-2.3 1.6-1.8 2-3.5 2-9.5V110h-33v4zm27 6.1c0 1.7-.5 2-3.2 1.7-2.2-.2-3.4-.9-3.6-2.1-.3-1.4.4-1.7 3.2-1.7 3 0 3.6.4 3.6 2.1zM83.4 122c-4.6 2.3-8.4 8.6-8.4 14 0 7.9 7.7 16 15.3 16 15.9 0 21.6-22.1 7.7-29.9-4.7-2.6-9.3-2.7-14.6-.1zM222 137.1v4l7.3-.2c5.5-.2 7.2.1 7.2 1.1 0 1.7-3.5 2.8-9.7 2.9l-4.8.1v8.6l7.2-1.4c5.7-1.2 7.9-1.2 10.5-.3 4.1 1.5 10.1.5 13.1-2.2 1.9-1.8 2.2-3.1 2.2-9.4V133h-33v4.1zm27 5.3c0 1.7-.7 2.5-2.4 2.8-4 .8-6.6-3.5-2.8-4.5 4.1-1.1 5.2-.7 5.2 1.7zm-20 15.5c-5.1 1.3-6.2 2.6-6.8 7.9-.4 4.4-.1 5.4 2.1 7.6 2.5 2.5 3.1 2.6 14.2 2.6 11.3 0 11.7-.1 14-2.6 3-3.2 3.3-8.8.7-12.2-1-1.3-3.6-2.7-5.7-3.2-4.4-1.1-14.6-1.1-18.5-.1zm17.8 6.7c1.3.4 2.2 1.4 2.2 2.5 0 1.7-.9 1.9-10.4 1.9-10.8 0-13.7-1-10.1-3.7 1.9-1.3 14-1.8 18.3-.7zM65.2 180.8c-7.6 2.4-13.4 12.4-11.1 19.3C56.8 208 62.2 212 70 212c8.8 0 15-5.5 15.8-14 .5-5.8-1.7-10.9-6.3-14.5-3.6-2.6-10.3-3.9-14.3-2.7zm156.8 4.4v4.3h11.7c7.4 0 11.8.4 12 1.1.6 1.8-6.9 3.4-15.6 3.4H222v8h9.9c8.4 0 10.2.3 12.2 2 2.8 2.3 3.5 2.1-10.8 2l-11.3-.1v8.1h33v-5.3c0-5-.2-5.3-4-7.7-4.6-2.8-4.9-3.7-1.7-5 4.8-2 5.7-3.5 5.7-9.4V181h-33v4.2zM7.3 226.4c-1.7.8-3.9 2.6-4.9 4.1-1.5 2.3-1.5 2.9-.3 5.2.8 1.4 4 4.8 7.1 7.6 5.8 5 7.5 8.8 4.4 10-2 .8-3.6-1.3-3.6-4.5 0-2.7-.2-2.8-4.5-2.8-4.2 0-4.5.2-4.5 2.5 0 3.4 2.5 8.2 4.9 9.5 1.1.5 4.2 1 6.9 1 6 0 9.9-2.6 10.8-7.4.9-4.8-1.7-9-8.1-13.1-5.6-3.6-6.8-5.8-3.8-6.9 1.6-.7 4.3 1.6 4.3 3.6 0 1 6.7 1.1 7.3 0 .8-1.5-1.4-7.2-3.2-8.1-3.4-1.9-9.5-2.2-12.8-.7zm121.8-.5c-4.5 1.3-6.4 5.3-6.9 14.6-.6 10.9 1 17 4.9 19 3.3 1.8 9 2 10.6.4.8-.8 1.7-.8 3.3.1 3.3 1.8 4 0 4-10.8V240h-5.5c-4.7 0-5.5.3-5.5 1.9 0 1 .7 2.4 1.5 3.1 1.9 1.6 2 7.4.1 8.9-.7.6-2.1.9-3 .5-1.3-.5-1.6-2.4-1.6-11.5V232h2.5c2 0 2.5.5 2.5 2.5 0 2.2.4 2.5 3.9 2.5 2.2 0 4.2-.4 4.6-1 .7-1.2-1.7-7.1-3.6-8.6-1.9-1.5-8.8-2.4-11.8-1.5zm55.2.2c-4.9 1.4-6.6 4.8-7.1 14.3-.7 14.1 2.2 18.6 12.1 18.6 6.3 0 8.4-1.2 9.7-5.8 1.5-5.5 1.2-18.4-.5-22.5-2.1-5-7.1-6.6-14.2-4.6zm6.5 6.1c.8.8 1.2 4.6 1.2 10.4 0 7.2-.3 9.4-1.6 10.5-2.8 2.3-4.4-1.4-4.4-10.4 0-9.9 1.7-13.6 4.8-10.5zm49.2-6.6c-6.2 2.2-8 6-8 17.1 0 12.2 2.9 16.3 11.3 16.3 3.8 0 5.3-.5 7.2-2.5 2.4-2.3 2.5-3 2.5-13.9 0-10.5-.2-11.7-2.2-14-2.3-2.5-7.8-4-10.8-3zm4.5 17c0 9-.3 10.9-1.5 10.9s-1.6-1.9-1.8-9.9c-.3-10.7.1-13 2.1-12.3.8.2 1.2 3.4 1.2 11.3zM53.4 226.9c-.2.2-.4 7.6-.4 16.3V259h9.5l-.3-6.2c-.4-10.1 3.4-12.3 4.4-2.7 1 8.8 1.1 8.9 5.2 8.9h3.9l-1.4-6.8c-1.2-5.4-1.2-7.4-.2-10.4 1.3-4 .7-11.4-1-13.1-1.1-1.1-18.8-2.7-19.7-1.8zm13.4 6.3c1.8 1.8 1.4 4.6-.8 5.8-2.8 1.5-4 .5-4-3.6 0-2.6.4-3.4 1.8-3.4 1 0 2.3.5 3 1.2zm18-6.4-3.8.3V259h8.5l-.2-16.1c-.1-8.9-.4-16.2-.5-16.3-.2 0-2 0-4 .2zm66.6.1c-.2.2-.4 7.6-.4 16.3V259h8c7.3 0 8.3-.3 10.5-2.5 1.9-1.9 2.5-3.5 2.5-7 0-2.6-.5-5.6-1.1-6.7-.8-1.4-.8-2.3 0-3.1 1.6-1.6 1.3-7.9-.4-10.1-1.2-1.6-3.2-2.1-10.1-2.6-4.7-.3-8.7-.3-9-.1zm12.2 7.7c.7 2.8-1.6 6.1-3.5 5-1.2-.8-1.5-5.9-.4-6.9 1.4-1.5 3.3-.6 3.9 1.9zm0 11.9c1.5 2.3 1.5 2.7 0 5.1-2.2 3.2-4 2.6-4.4-1.5-.6-6.2 1.5-8 4.4-3.6zM29 242.9V259h7.9l.3-7.2.3-7.3 4.9-.7c2.7-.4 5.3-1.3 5.8-2 2.4-3.7 2.2-8.5-.6-12.3-1.2-1.7-2.8-2.1-10-2.4l-8.6-.3v16.1zm12.6-8.2c.8 3.2-2 6-4.3 4.2-1.4-1.2-1.8-5.1-.6-6.2 1.6-1.7 4.3-.6 4.9 2zM96 243v16h8v-9.5c0-7.4.3-9.5 1.4-9.5 1.7 0 2.4 2.6 3.3 11.7l.6 7.3h7.7v-32h-4.1c-4 0-4.1.1-3.7 3 .7 4.4-.9 4.7-3.3.6-1.8-3.2-2.6-3.6-6-3.6H96v16zm109-.1V259h9v-6.9c0-6.1 1.1-9.3 2.6-7.8.3.3 1 3.7 1.6 7.6l1 7.1h7.8l-.6-4.2c-.3-2.4-1-5.8-1.6-7.6-.7-2.4-.6-3.7.3-4.8.7-.9 1.3-3.8 1.3-6.5 0-7.3-1.5-8.3-12.4-8.7l-9-.4v16.1zm14.1-8.7c1 1.8.8 2.4-1.1 4-2.9 2.3-4 1.5-4-2.8 0-2.7.4-3.4 2-3.4 1 0 2.5 1 3.1 2.2z"/>
                    </svg>
               </div>
               <p class="ticket-number">
                  #{{ explode('-', $attendee->ticket->uuid)[0] }}
               </p>
            </div>
         </div>
      </div>
   </body>
</html>