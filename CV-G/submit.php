<?php
define('Token', 'HGsZOXpfNC'); // Token is used to prevent CSRF attacks 
// CSRF stands for Cross Site Request Forgery and is a type of attack where a user is tricked 
//into performing an action on a website that they are currently logged into
// The token is used to prevent this attack by checking if the token is the same as the one in the form
// Arrays to store the data
$skills = [];
$skill_levels = [];
$hobbies = [];
$institutes = [];
$degrees = [];
$froms = [];
$tos = [];
$grades = [];
$titles = [];
$descriptions = [];

if (Token == $_POST['token']) {
  $temp_profile = $_FILES['profile_image']['tmp_name']; // Temporary location of the file
  $profile = $_FILES['profile_image']['name']; // Name of the file
  move_uploaded_file($temp_profile, 'images/' . $profile); // Move the file to the images folder
  $first_name = $_POST['first_name']; // Get the first name
  $last_name = $_POST['last_name']; // Get the last name
  $profession = $_POST['profession']; // Get the profession
  $email = $_POST['email']; // Get the email
  $phone = $_POST['phone']; // Get the phone number
  $about_me = $_POST['about_me']; // Get the about me section
  array_push($skills, $_POST['skill1']); // Push the skill to the skills array
  array_push($skill_levels, intval($_POST['skill_level1'])); // Push the skill level to the skill_levels array
  array_push($hobbies, $_POST['hobby1']); // Push the hobby to the hobbies array
  array_push($institutes, $_POST['institute1']); // Push the institute to the institutes array
  array_push($degrees, $_POST['degree1']); // Push the degree to the degrees array
  array_push($froms, $_POST['from1']); // Push the from date to the froms array
  array_push($tos, $_POST['to1']); // Push the to date to the tos array
  array_push($grades, $_POST['grade1']); // Push the grade to the grades array
  array_push($titles, $_POST['title1']); // Push the title to the titles array
  array_push($descriptions, $_POST['description1']); // Push the description to the descriptions array

  if (isset($_POST['skill2']) && !empty($_POST['skill2'])) { // Check if the skill2 is set and not empty
    if (isset($_POST['skill_level2']) && !empty($_POST['skill_level2'])) { // Check if the skill_level2 is set and not empty
      array_push($skills, $_POST['skill2']); // Push the skill to the skills array
      array_push($skill_levels, intval($_POST['skill_level2'])); // Push the skill level to the skill_levels array
    }
  }
  if (isset($_POST['skill3']) && !empty($_POST['skill3'])) {
    if (isset($_POST['skill_level3']) && !empty($_POST['skill_level3'])) {
      array_push($skills, $_POST['skill3']);
      array_push($skill_levels, intval($_POST['skill_level3']));
    }
  }
  if (isset($_POST['skill4']) && !empty($_POST['skill4'])) {
    if (isset($_POST['skill_level4']) && !empty($_POST['skill_level4'])) {
      array_push($skills, $_POST['skill4']);
      array_push($skill_levels, intval($_POST['skill_level4']));
    }
  }
  if (isset($_POST['skill5']) && !empty($_POST['skill5'])) {
    if (isset($_POST['skill_level5']) && !empty($_POST['skill_level5'])) {
      array_push($skills, $_POST['skill5']);
      array_push($skill_levels, intval($_POST['skill_level5']));
    }
  }
  if (isset($_POST['hobby2']) && !empty($_POST['hobby2'])) { // Check if the hobby2 is set and not empty
    array_push($hobbies, $_POST['hobby2']); // Push the hobby to the hobbies array
  }
  if (isset($_POST['hobby3']) && !empty($_POST['hobby3'])) {
    array_push($hobbies, $_POST['hobby3']);
  }
  if (isset($_POST['hobby4']) && !empty($_POST['hobby4'])) {
    array_push($hobbies, $_POST['hobby4']);
  }
  if (isset($_POST['institute2']) && !empty($_POST['institute2'])) { // Check if the institute2 is set and not empty
    if (isset($_POST['degree2']) && !empty($_POST['degree2'])) { // Check if the degree2 is set and not empty
      if (isset($_POST['from2']) && !empty($_POST['from2'])) { // Check if the from2 is set and not empty
        if (isset($_POST['to2']) && !empty($_POST['to2'])) { // Check if the to2 is set and not empty
          if (isset($_POST['grade2']) && !empty($_POST['grade2'])) { // Check if the grade2 is set and not empty
            array_push($institutes, $_POST['institute2']);
            array_push($degrees, $_POST['degree2']);
            array_push($froms, $_POST['from2']);
            array_push($tos, $_POST['to2']);
            array_push($grades, $_POST['grade2']);
          }
        }
      }
    }
  }
  if (isset($_POST['institute3']) && !empty($_POST['institute3'])) { // Check if the institute3 is set and not empty
    if (isset($_POST['degree3']) && !empty($_POST['degree3'])) { // Check if the degree3 is set and not empty
      if (isset($_POST['from3']) && !empty($_POST['from3'])) { // Check if the from3 is set and not empty
        if (isset($_POST['to3']) && !empty($_POST['to3'])) { // Check if the to3 is set and not empty
          if (isset($_POST['grade3']) && !empty($_POST['grade3'])) { // Check if the grade3 is set and not empty
            array_push($institutes, $_POST['institute3']);
            array_push($degrees, $_POST['degree3']);
            array_push($froms, $_POST['from3']);
            array_push($tos, $_POST['to3']);
            array_push($grades, $_POST['grade3']);
          }
        }
      }
    }
  }
  if (isset($_POST['title2']) && !empty($_POST['title2'])) { // Check if the title2 is set and not empty
    if (isset($_POST['description2']) && !empty($_POST['description2'])) { // Check if the description2 is set and not empty
      array_push($titles, $_POST['title2']); // Push the title to the titles array
      array_push($descriptions, $_POST['description2']); // Push the description to the descriptions array
    }
  }
  if (isset($_POST['title3']) && !empty($_POST['title3'])) { // Check if the title3 is set and not empty
    if (isset($_POST['description3']) && !empty($_POST['description3'])) { // Check if the description3 is set and not empty
      array_push($titles, $_POST['title3']); // Push the title to the titles array
      array_push($descriptions, $_POST['description3']); // Push the description to the descriptions array
    }
  }
} else {
  echo '<script>alert("Please fill all the required fields")</script>';
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
  <link rel="stylesheet" href="style.css">
  <title><?php echo ucwords($first_name) . ' Resume'; ?></title>
</head>

<body>

  <div class="grid-container">
    <div class="zone-1">
      <div class="toCenter">
        <img src="images/<?php echo $profile; ?>" class="profile">
      </div>
      <div class="contact-box">
        <div class="title">
          <h2>Contact</h2>
        </div>
        <div class="call"><i class="fas fa-phone-alt"></i>
          <div class="text"><?php echo $phone; ?></div>
        </div>
        <div class="email"><i class="fas fa-envelope"></i>
          <div class="text"><?php echo $email; ?></div>
        </div>
      </div>
      <div class="personal-box">
        <div class="title">
          <h2>Skills</h2>
        </div>
        <?php
        for ($j = 0; $j < count($skills); $j++) {
          echo "<div class='skill-1'>
                  <p><strong>" . strtoupper($skills[$j]) . "</strong></p>
                  <div class='progress'>";
          for ($i = 0; $i < $skill_levels[$j]; $i++) {
            echo '<div class="fas fa-star active"></div>';
          }
          echo '</div></div>';
        }
        ?>
      </div>
      <div class="hobbies-box">
        <div class="title">
          <h2>Hobbies</h2>
        </div>
        <?php
        foreach ($hobbies as $hobby) {
          echo "<div class='d-flex align-items-center'>
          <div class='circle'></div>
          <div><strong>" . ucwords($hobby) . "</strong></div>
        </div>";
        }


        ?>
      </div>
    </div>
    <div class="zone-2">
      <div class="headTitle">
        <h1><?php echo ucwords($first_name); ?><br><b><?php echo ucwords($last_name); ?></b></h1>
      </div>
      <div class="subTitle">
        <h1><?php echo ucwords($profession); ?><h1>
      </div>
      <div class="group-1">
        <div class="title">
          <div class="box">
            <h2>About Me</h2>
          </div>
        </div>
        <div class="desc"><?php echo $about_me; ?></div>
      </div>
      <div class="group-2">
        <div class="title">
          <div class="box">
            <h2>Education</h2>
          </div>
        </div>
        <div class="desc">
          <?php
          for ($i = 0; $i < count($institutes); $i++) {
            echo "<ul>
            <li>
              <div class='msg-1'>" . $froms[$i] . "-" . $tos[$i] . " | " . ucwords($degrees[$i]) . ", " . $grades[$i] . "</div>
              <div class='msg-2'>" . ucwords($institutes[$i]) . "</div>
            </li>
          </ul>";
          }
          ?>
        </div>
      </div>
      <div class="group-3">
        <div class="title">
          <div class="box">
            <h2>Experience</h2>
          </div>
        </div>
        <div class="desc">
          <?php
          for ($i = 0; $i < count($titles); $i++) {
            echo "<ul>
            <li>
              <div class='msg-1'><br></div>
              <div class='msg-2'>" . ucwords($titles[$i]) . "</div>
              <div class='msg-3'>" . ucfirst($descriptions[$i]) . "</div>
            </li>
          </ul>";
          }
          ?>
        </div>
      </div>
    </div>
  </div>

  <div class="download">
    <button onclick="window.print()">Download</button>
  </div>

  
</body>

</html>