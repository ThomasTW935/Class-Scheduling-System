<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <link rel="stylesheet" href="styles/style.css"/>
   <script defer src="scripts/script.js"></script>
   <title>Class Scheduling System</title>
</head>
<body>
   <nav class="navScheduling">
      <div class="navScheduling__Icon">
         <div class="navScheduling__Icon--Line"></div>
         <div class="navScheduling__Icon--Line"></div>
         <div class="navScheduling__Icon--Line"></div>
      </div>
      <ul class="navScheduling__List">
         <li class="navScheduling__List--Item" id="sections"><a href="#">Sections</a></li>
         <li class="navScheduling__List--Item" id="rooms"><a href="#">Room</a></li>
         <li class="navScheduling__List--Item" id="professors"><a href="#">Professors</a></li>
         <li class="navScheduling__List--Item" id="subjects"><a href="#">Subjects</a></li>
      </ul>
      <div class="navScheduling__Search">
         <img src="icons/search-Icon.svg" alt="Search">
         <input type="text" placeholder="Search...">
      </div>
   </nav>
      
   <main class="mainScheduling">
      <div class="sections">
            <a class="sections__Card" href="#BSIT101">
               <img src="Schedule.JPG"/>
               <h1>BSIT101</h1>
            </a>
            <a class="sections__Card" href="#BSIT201">
               <img src="Schedule.JPG"/>
               <h1>BSIT201</h1>
            </a>
            <a class="sections__Card" href="#BSIT301">
               <img src="Schedule.JPG"/>
               <h1>BSIT301</h1>
            </a>
            <a class="sections__Card" href="#BSIT401">
               <img src="Schedule.JPG"/>
               <h1>BSIT401</h1>
            </a>
            <a class="sections__Card" href="#BSIT501">
               <img src="Schedule.JPG"/>
               <h1>BSIT501</h1>
            </a>
            <a class="sections__Card" href="#BSIT601">
               <img src="Schedule.JPG"/>
               <h1>BSIT601</h1>
            </a>
            <a class="sections__Card" href="#BSIT701">
               <img src="Schedule.JPG"/>
               <h1>BSIT701</h1>
            </a>
         </section>
      </div>
      <div class="rooms">
         <section class="rooms__Floors">
            <h1>1st Floor</h1>
            <div class="rooms__Floors--room">
               <img src="Schedule.JPG"/>
               <h1>101</h1>
            </div>
            <div class="rooms__Floors--room">
               <img src="Schedule.JPG"/>
               <h1>102</h1>
            </div>
            <div class="rooms__Floors--room">
               <img src="Schedule.JPG"/>
               <h1>103</h1>
            </div>
            <div class="rooms__Floors--room">
               <img src="Schedule.JPG"/>
               <h1>104</h1>
            </div>
            <div class="rooms__Floors--room">
               <img src="Schedule.JPG"/>
               <h1>105</h1>
            </div>
            <div class="rooms__Floors--room">
               <img src="Schedule.JPG"/>
               <h1>106</h1>
            </div>
            <div class="rooms__Floors--room">
               <img src="Schedule.JPG"/>
               <h1>107</h1>
            </div>
            <div class="rooms__Floors--room">
               <img src="Schedule.JPG"/>
               <h1>108</h1>
            </div>
            <div class="rooms__Floors--room">
               <img src="Schedule.JPG"/>
               <h1>109</h1>
            </div>
            <div class="rooms__Floors--room">
               <img src="Schedule.JPG"/>
               <h1>110</h1>
            </div>
            <div class="rooms__Floors--room">
               <img src="Schedule.JPG"/>
               <h1>111</h1>
            </div>
         </section>
         <section class="rooms__Floors">
            <h1>2nd Floor</h1>
            <div class="rooms__Floors--room">
               <img src="Schedule.JPG"/>
               <h1>201</h1>
            </div>
            <div class="rooms__Floors--room">
               <img src="Schedule.JPG"/>
               <h1>202</h1>
            </div>
            <div class="rooms__Floors--room">
               <img src="Schedule.JPG"/>
               <h1>203</h1>
            </div>
            <div class="rooms__Floors--room">
               <img src="Schedule.JPG"/>
               <h1>204</h1>
            </div>
         </section>
         <section class="rooms__Floors">
            <h1>3rd Floor</h1>
            <div class="rooms__Floors--room">
               <img src="Schedule.JPG"/>
               <h1>301</h1>
            </div>
            <div class="rooms__Floors--room">
               <img src="Schedule.JPG"/>
               <h1>302</h1>
            </div>
            <div class="rooms__Floors--room">
               <img src="Schedule.JPG"/>
               <h1>303</h1>
            </div>
            <div class="rooms__Floors--room">
               <img src="Schedule.JPG"/>
               <h1>304</h1>
            </div>
         </section>
         <section class="rooms__Floors">
            <h1>4th Floor</h1>
            <div class="rooms__Floors--room">
               <img src="Schedule.JPG"/>
               <h1>401</h1>
            </div>
            <div class="rooms__Floors--room">
               <img src="Schedule.JPG"/>
               <h1>402</h1>
            </div>
            <div class="rooms__Floors--room">
               <img src="Schedule.JPG"/>
               <h1>403</h1>
            </div>
            <div class="rooms__Floors--room">
               <img src="Schedule.JPG"/>
               <h1>404</h1>
            </div>
         </section>
      </div>
      <div class="professors">
         <section class="professors__Dept">
            <h1>2nd Floor</h1>
            <div class="professors__Dept--prof">
               <img src="Schedule.JPG"/>
               <div>
                  <img src="icons/professor-default.svg"></img>
                  <h1>201</h1>
               </div>
            </div>
            <div class="professors__Dept--prof">
               <img src="Schedule.JPG"/>
               <h1>202</h1>
            </div>
            <div class="professors__Dept--prof">
               <img src="Schedule.JPG"/>
               <h1>203</h1>
            </div>
            <div class="professors__Dept--prof">
               <img src="Schedule.JPG"/>
               <h1>204</h1>
            </div>
         </section>
      </div>
      <div class="subjects">sss</div>
   </main>
</body>
</html>