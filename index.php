 <?php include "templates/header.php"; ?>

<style>
* {
  box-sizing: border-box;
}

.column {
  float: left;
  padding: 10px;
  height: 300px; /* Should be removed. Only for demonstration */
}

.left, .right {
  width: 100%;
  height:100%;
  overflow: scroll;
}

.middle {
  width: 50%;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}
</style>
</head>
<body>


<div class="row">
  <div class="column left" style="background-color:#ffeee6;">

    <h2>Welcome To My Database Web Interface</h2>
    
    <p>Welcome to my database web interface. My idea for this project originated from my desire to have an efficient way to track
    all the job applications I’m filling out in a way that’s more interactive than your standard excel spreadsheet. By storing
    this information in an SQL database I will also be able to extrapolate additional information that could be beneficial
    towards finding employment for summer 2020. <br><br>
  In addition to tracking my own job applications, I have expanded this idea to include multiple student users, advisors, 
  and company profiles. This allows me to incorporate more of the relationships and other concepts we’ve studied this semester. 
  In its current iteration, each student will create a record for any job application they’ve submitted and continue to 
  update the records as they hear back from companies. Each student is also assigned an advisor that can track the students progress, 
  emulating an internship placement office that some universities provide. Along with helping students, advisors will keep a separate 
  table of contacts at companies that have hired Suffolk students previously in order to build relationships with said companies, 
  with the ultimate goal of improving students chances of getting placed into an internship or entry level job. <br><br>

Some additional information that can be learned from SQL Queries and creating joint tables includes: <br><br>

-How many applications the average student fills out before getting hired<br>
-How long it takes the average student to find work after beginning their search<br>
-What salary range is typical for entry positions<br>
-What industries Suffolk students are most interested in<br>
-What zip codes house the most tech companies in Boston metro<br>
-Do certain advisors have more students finding work than others <br><br>

Relationships include:<br>
-each student must have one advisor, but advisors have many students<br> 
-each student can have at most one completed application/successful hire <br>
-many students can apply to many different companies<br><br>

Below you can view the initial E/R diagram I started the project from, as well as tables displaying primary keys and data types.</p>
</div>

  <div style="background-color:#ffeee6;"float="right";>
  <img src="ER_Diagram.JPG" alt="ER Diagram" width="500" height="333">




  </div>
</div>





    <?php include "templates/footer.php"; ?>
