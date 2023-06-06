<?php
// function to create header section
function Head()
{
  ?>
  <header style="padding: 0px; position: fixed; top: 0px;">
  <nav class="site-navigation position-relative text-right bg-black text-md-right" role="navigation">
    <div class="container position-relative" style="margin: 0px; padding: 0px; display: flex; justify-content: ;">
      <ul class="menu-list js-clone-nav" style="display: flex; align-items: center;">
        <li><a href="home.php">Home</a></li>
        <li class="has-children">
          <a href="#">Shop</a>
          <ul class="sub-menu arrow-top" style="text-align: left; float: left; list-style: none; padding: 2px;">
            <li>
              <a style="padding-top: 4px; padding-bottom: 4px;" href="Merchandise.php"
                onmouseover="this.style.backgroundColor='grey';" onmouseout="this.style.backgroundColor='';">Merchandise</a>
            </li>
            <li>
              <a style="padding-top: 4px; padding-bottom: 4px;" href="Tickets.php"
                onmouseover="this.style.backgroundColor='grey';" onmouseout="this.style.backgroundColor='';">Tickets</a>
            </li>
          </ul>
        </li>
        <li><a href="team.php">Team</a></li>
        <li><a href="news.php">News</a></li>
        <li><a href="matches.php">Matches</a></li>
      </ul>
      <ul class="menu-list js-clone-nav" style="display: flex; align-items: center;align-items:flex-end;" >
        <li ><a href="../Pages/user_profile.php"><img style="width: 30px;" src="../images/user.png" alt="icon"></a></li>
      </ul>
    </div>
  </nav>
</header>

<?php }

// function to create common parts of the background image and words between team and matches 
function commonPartTeamMatches($Title, $description, $imageLink)
{ ?>
  <div class="site-blocks-cover overlay" style="background-image:url(<?php echo $imageLink ?>);" data-aos="fade"
    data-stellar-background-ratio="0.5">
    <div class="container">
      <div class="row align-items-center justify-content-start">
        <div class="col-md-6 text-center text-md-left" data-aos="fade-up" data-aos-delay="400">
          <h1>
            <?php echo $Title ?>
          </h1>
          <p class="mt-4">
            <?php echo $description ?>
          </p>
        </div>
      </div>
    </div>
  </div>
<?php }

// function to create footer section
function footer()
{ ?>
  <style>
    body {
      margin-bottom: 0px;
    }

    footer {
      background-color: #1d1d1d;
      color: #fff;
      padding: 30px 0;
      text-align: center;
      font-size: 18px;
      font-weight: bold;
      min-height: 60px;
      position: relative;
      bottom: -30px;
    }
  </style>
  <footer class="site-footer border-top">
    <div class="container">
      Join the Club, Support the Team, Live the Dream - Together!
      <div class="col-md-12">
        <p>
          <!-- Script to decode email address -->
          Copyright &copy;
          <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
          <script>document.write(new Date().getFullYear());</script> All rights reserved
        </p>
      </div>
    </div>
  </footer>
<?php }