<?php

// define variables and set to empty values
$firstname = $lastname = $email = $message = $name = "";

if ($_POST['contact_form_submitted']) {

  $firstname = test_input($_POST["firstname"]);
  $lastname = test_input($_POST["lastname"]);
  $email = test_input($_POST["email"]);
  $comments = test_input($_POST["comments"]);
  $name = $firstname . " " . $lastname;

  $to      = 'jpheider@gmail.com';
  $subject = 'From Jordanheider.com Contact Form';

  $message = '
  <style type="text/css" media="all">
  	body { font-family:Arial; }
  	table { border:none; }
  	th { text-align:left; vertical-align:top; width:30%; }
  	td { vertical-align:top; }
  </style>
  <body>
  <p>The following information was submitted from the <strong>Contact Form</strong> on the <em>JordanHeider.com</em> website:</p>
  <table>
  	<tr>
  		<th align="left">Name:</th>
  		<td>' . $name . '</td>
  	</tr>
  	<tr>
  		<th align="left">E-mail Address:</th>
  		<td>' . $email . '</td>
  	</tr>
  	<tr>
  		<th align="left">Comments:</th>
  		<td>' . $comments . '</td>
  	</tr>
  </table>
  </body>
  ';

  $headers = "From: " . $name . "\r\n"
  . "MIME-Version: 1.0\r\n"
  . "Content-Type: text/html; charset=ISO-8859-1\r\n"
  . "Reply-To: " . $email . "\r\n"
  . "X-Mailer: PHP/" . phpversion();

  mail($to, $subject, $message, $headers);
}

function test_input($data) {
  $data = trim($data); // remove unnecessary characters (extra spaces, tabs, new lines)
  $data = stripslashes($data); //remove backslashes from user input
  $data = htmlspecialchars($data); //prevent js injection, and XSS
  return $data;
}
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
<title>Jordan Heider Design &amp; Web Development Portfolio</title>
<link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
<link rel="manifest" href="/manifest.json">
<!-- Bootstrap v 3.3.7 with SRI -->
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<link rel="stylesheet" media="all" href="//fonts.googleapis.com/css?family=Oswald" />
<link rel="stylesheet" media="all" href="//fonts.googleapis.com/css?family=Roboto+Slab" />
<link rel="stylesheet" media="all" href="/css/style.css" />

<!-- jQuery 3.1.1 with SRI -->
<script
  src="//code.jquery.com/jquery-3.1.1.min.js"
  integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
  crossorigin="anonymous"></script>

<!-- Bootstrap v 3.3.7 with SRI -->
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<script type="text/javascript">
 $(document).ready(function(){

    //Form disable submit until fields are filled out
    $('#contact .submit').prop('disabled', true);
    console.log('disabled');
    $('#contact textarea').on('keyup', function(){
      if ( $('#firstname').val() && $('#lastname').val() && $('#email').val() && $('#comments').val() ) {
        console.log('enabled');
        $('#contact .submit').prop('disabled', false);
      }
    });

    //Form prevent page reload on submit
    $('#contact .submit').on('click', function(e) {
      $successMessage = '<p class="thankyou-pic"><img src="images/Vicks-laptop.jpg" width="100%; height="auto" alt="Vicks on computer"/></p><h1 class="text-center">Thank you for the message!</h1><p class="text-center">I\'ll respond as soon as the boss is done with the Macbook.</p>';
      $.ajax({ //ajax call to send email
        type: "POST",
        url: "index.php",
        data: {
          "contact_form_submitted" : true,
          "firstname" : $('#firstname').val(),
          "lastname" : $('#lastname').val(),
          "email" : $('#email').val(),
          "comments" : $('#comments').val()
        },
        success: function(msg){
          console.log('Successful submission. ');
          $('#contactblock').html($successMessage);
        }, //end success: function
        error: function(xhr, desc, err) {
          console.log(xhr + "\n" + err);
        }// end error: function
      });//end ajax
      e.preventDefault();

    })

    $('body').scrollspy({ target: '.navbar' });

    $(".navbar .drawing").on('click', function(){
  	  location.href = '/drawing/';
  	});

  	$('.navbar a, .footer-box a, .more-indicator a').on('click', function(event){
  	  event.preventDefault();
  	  var sectionID = $(this).attr("data-id");
  	  scrollToID('#' + sectionID,500);
  	});

    $('.navbar .navbar-toggle').on('click', function(event){
      event.preventDefault();
      $('.navbar-collapse').slideDown();
      $('.modal-backdrop').show();
    });

    //close navbar after click/touch
    $('.navbar-collapse a').on('click', function(event){
  	   event.preventDefault();
  	   $('.navbar-collapse').slideUp();
       $('.modal-backdrop').hide();
       $('body').removeClass('modal-open').css('padding-right: 0');
  	});

    function scrollToID(id,speed) {
    	var targetOffset = $(id).offset().top;
    	$('html,body').animate({scrollTop:targetOffset}, speed);
    }

    //Inject project info into Modal on click
    $('.projects').on('click', function(){
      var $title,$pic,$picString,$attribution,$attributionArr,$attrLinkURL,$attrLinkText;
      $title = $(this).attr('title');
      $pic = $(this).children('img').attr('src');
      $picString = '<img src="' + $pic + '" width="100%" height="auto" alt="' + $title + '"/>';
      $attribution = $(this).attr('data-attribution');
      if ($attribution){
        $('#projectModal .modal-header p').removeClass('hidden');
        $attributionArr = $attribution.split('-');
        $attribution = $attributionArr[0];
        $attrLinkURL = $(this).attr('data-attrlink');
        $attrLinkText = $attributionArr[1];
        $attrLinkString = '<a href="' + $attrLinkURL + '" target="_blank">' + $attrLinkText + '</a>';
        $('#projectModal .modal-header p').html('<em>' + $attribution + '</em> ' + $attrLinkString);
      }
      else {
        $('#projectModal .modal-header p').addClass('hidden');
      }
      $("#projectModal .modal-title").text($title); //Set Modal Title
      $("#projectModal #target").html($picString);
    });

    $('.projects').on('mousenter', function() {
      $('img').css({opacity:.5});
      $(this).html("<p>icon thing</p>");
    });

    // Initiate carousel
    $('.carousel').carousel({
      interval: 8000
    });
    // Show Many, Slide One Carousel by Matthew Harris
    // Github: https://github.com/rtpHarry/Bootstrap3-ShowManySlideOneCarousel/wiki/Change-the-number-of-slides-visible-at-any-one-time
    (function(){
      $('.carousel-showmanymoveone .item').each(function(){
        var itemToClone = $(this);

        for (var i=1;i<4;i++) {
          itemToClone = itemToClone.next();

          // wrap around if at end of item collection
          if (!itemToClone.length) {
            itemToClone = $(this).siblings(':first');
          }

          // grab item, clone, add marker class, add to collection
          itemToClone.children(':first-child').clone()
          .addClass("cloneditem-"+(i))
          .appendTo($(this));
        }
      });
    }());

    //Create Tracking Even for Contact Form Submissions
    $('#contact .submit').on('click', function(){
      ga('send', 'event', 'Contact Form', 'Submit', 'Form submitted successfully');
    });


});
</script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-3562271-1', 'auto');
  ga('send', 'pageview');

</script>
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="50" class="styled">

<div class="container-fluid">

    <!-- BEGIN NAVBAR ------------------------------------------>
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container-fluid">
				<div class="navbar-header">
					<span class="navbar-brand small-logo">
						 Jordan Heider</span>
					<button type="button" class="navbar-toggle">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
        </div><!-- .navbar-header -->
        <div class="collapse navbar-collapse" id="mainNav">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#home" data-id="home">Home</a></li>
            <li><a href="#portfolio" data-id="portfolio">Portfolio</a></li>
            <li><a href="#about" data-id="about">About</a></li>
            <li><a href="#contact" data-id="contact">Contact</a></li>
            <!-- <li><a class="drawing" href="#" data-id="">Drawing <span class="glyphicon glyphicon-chevron-right"></span></a></li> -->
          </ul>
        </div><!-- .collapse .navbar-collapse #mainNav -->
      </div><!-- .container-fluid -->
    </nav>
    <!-- END NAVBAR ----------------------------------------->

    <!-- BEGIN INTRO SCREEN --------------------------------->
    <div class="row">
			<section id="home" class="content-box bg-panels-1">
				<div class="v-center h-center">
					<h1 class="text-center hero-text">Jordan Heider</h1>
				<h3 class="subhead text-center">DESIGN &amp; WEB DEVELOPMENT PORTFOLIO</h3>
        </div><!-- .v-center .h-center -->
        <div class="more-indicator text-center col-md-12">
          <a class="" href="#portfolio" data-id="portfolio">
            <i class="fa fa-angle-down" aria-hidden="true"></i>
          </a>
        </div><!-- .more-indicator .text-center .col-md-12 -->
			</section>
		</div><!-- .row -->
    <!-- END INTRO SCREEN ---------------------------------->

    <!-- BEGIN PORTFOLIO ----------------------------------->
    <div class="row">
      <section id="portfolio" class="content-box bg-panels-3">
        <div class="v-center">
          <div class="row">
            <div class="col-md-12">
              <h1 class="text-center">Portfolio</h1>
            </div><!-- .col-md-12 -->

            <div id="projects-carousel" class="carousel slide carousel-showmanymoveone" data-ride="carousel">
              <!-- Indicators -->
              <ol class="carousel-indicators">
                <li data-target="#projects-carousel" data-slide-to="0" class="active"></li>
                <li data-target="#projects-carousel" data-slide-to="1"></li>
                <li data-target="#projects-carousel" data-slide-to="2"></li>
                <li data-target="#projects-carousel" data-slide-to="3"></li>
                <li data-target="#projects-carousel" data-slide-to="4"></li>
                <li data-target="#projects-carousel" data-slide-to="5"></li>
                <li data-target="#projects-carousel" data-slide-to="6"></li>
              </ol>

              <!-- Wrapper for slides -->
              <div class="carousel-inner" role="listbox">
                <aside class="item active">
                  <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="portfolio-block">
                      <p class="caption">Mon Amie Boutique</p>
                      <a class="projects" title="Mon Amie Boutique Website" href="#" data-toggle="modal" data-target="#projectModal"><img src="images/PortfolioWork/MonAmie-on-12-30-15.jpg" alt="Mon Amie Boutique website" width="100%" height="auto" /></a><a href="#" class="tag" data-tag="design"><span class="glyphicon glyphicon-pencil"></span> Design</a> <a href="#" class="tag" data-tag="programming"><span class="glyphicon glyphicon-cog"></span> Programming</a>
                    </div><!-- end .portfolio-block -->
                  </div><!-- end grid block -->
                </aside><!-- .item 1-->

                <aside class="item">
                  <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="portfolio-block">
                      <p class="caption">Marine Travelift</p>
                      <a href="#" class="projects" title="Marine Travelift Website" data-toggle="modal" data-target="#projectModal"><img src="images/PortfolioWork/MarineTravelift-on-12-30-15.jpg" width="100%" height="auto" alt="Marine Travelift website" /></a>
                      <a class="tag" data-tag="design" href="#"><span class="glyphicon glyphicon-pencil"></span> Design</a>
                    </div><!-- end .portfolio-block -->
                  </div><!-- end grid block -->
                </aside><!-- .item 2-->

                <aside class="item">
                  <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="portfolio-block">
                      <p class="caption">Anchor Glass</p>
                      <a href="#" title="Anchor Glass Website" class="projects" data-toggle="modal" data-target="#projectModal"><img src="images/PortfolioWork/AnchorGlass-on-12-30-15.jpg" width="100%" height="auto" alt="Anchor Glass website" /></a>
                      <a href="#" class="tag" data-tag="design"><span class=" glyphicon glyphicon-pencil"></span> Design</a>
                    </div><!-- end .portfolio-block -->
                  </div><!-- end grid block -->
                </aside><!-- .item 4 -->

                <aside class="item">
                  <div class="col-xs-12 col-sm-6 col-md-3">
            				<div class="portfolio-block">
                  		<p class="caption">Expera Specialty Solutions</p>
            					<a href="#" title="Expera Specialty Solutions Website" class="projects" data-toggle="modal" data-target="#projectModal"><img src="images/PortfolioWork/Expera-on-12-30-15.jpg" width="100%" height="auto" alt="Expera Specialty Solutions website" /></a> <a href="#" class="tag" data-tag="design"><span class="glyphicon glyphicon-pencil"></span> Design</a>
            					<a href="#" class="tag" data-tag="programming"><span class="glyphicon glyphicon-cog"></span> Programming</a>
            				</div><!-- end .portfolio-block -->
            			</div><!-- end grid block -->
                </aside><!-- .item 5-->

                <aside class="item">
                  <div class="col-xs-12 col-sm-6 col-md-3">
            				<div class="portfolio-block">
                  		<p class="caption">Donut Mile</p>
            					<a href="#" class="projects" title="CrossFit Green Bay Donut Mile 2016" data-toggle="modal" data-target="#projectModal"><img src="images/PortfolioWork/2016-Donut-Mile-Shirt-Project-Shot.jpg" width="100%" height="auto" alt="CrossFit Green Bay Donut Mile 2016" /></a> <a href="#" class="tag" data-tag="design"><span class="glyphicon glyphicon-pencil"></span> Design</a>
            				</div><!-- end .portfolio-block -->
            			</div><!-- end grid block -->
                </aside><!-- .item 6 -->

                <aside class="item">
                  <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="portfolio-block">
                      <p class="caption">Ice Bowl 2017</p>
                      <a href="#" class="projects" title="CrossFit Green Bay Ice Bowl 2017" data-toggle="modal" data-attribution="Photography by - Let It Rain Studios" data-attrlink="http://letitrainstudios.com" data-target="#projectModal"><img src="images/PortfolioWork/2017-IB-Shirt-Project-Shot.jpg" width="100%" height="auto" alt="CrossFit Green Bay - Ice Bowl 2017" /></a> <a href="#" class="tag" data-tag="design"><span class="glyphicon glyphicon-pencil"></span> Design</a>
                    </div><!-- end .portfolio-block -->
                  </div><!-- end grid block -->
                </aside><!-- .item 7-->

                <aside class="item">
                  <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="portfolio-block">
                      <p class="caption">Ice Bowl 2016</p>
                      <a href="#" class="projects" title="CrossFit Green Bay Ice Bowl 2016" data-toggle="modal" data-attribution="Photography by - Let It Rain Studios" data-attrlink="http://letitrainstudios.com" data-target="#projectModal"><img src="images/PortfolioWork/2016-IB-Shirt-Project-Shot.jpg" width="100%" height="auto" alt="CrossFit Green Bay - Ice Bowl 2016" /></a> <a href="#" class="tag" data-tag="design"><span class="glyphicon glyphicon-pencil"></span> Design</span></a>
                    </div><!-- end .portfolio-block -->
                  </div><!-- end grid block -->
                </aside><!-- .item 8-->
              </div><!-- .carousel-inner -->

              <!-- Controls -->
              <a class="left carousel-control" href="#projects-carousel" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a><!-- .carousel-control -->
              <a class="right carousel-control" href="#projects-carousel" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a><!-- .carousel-control -->
            </div><!-- #projects-carousel -->

          </div><!-- .row -->
        </div><!-- .v-center -->
      </section>
  	</div><!-- / .row -->
    <!-- END PORTFOLIO --------------------------------->
    <!-- BEGIN MODAL FOR PROJECTS ---------------------->
    <div class="modal fade" id="projectModal" tabindex="-1" role="dialog" aria-labelledby="workModal">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Modal title</h4>
            <p>Modal attribution</p>
          </div><!-- .modal-header" -->
          <div class="modal-body">
            <div class="row">
              <figure class="col-md-12" id="target">img here</figure><!-- / #target .col-md-12 -->
            </div><!-- .row -->
          </div><!-- .modal-body -->
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal #projectModal -->
    <!-- END MODAL For PROJECTS ------------------------>


    <!-- BEGIN ABOUT ----------------------------------->
    <div class="row">
      <section id="about" class="content-box bg-panels-2">
        <div class="v-center">
          <div class="row">
            <div class="col-md-10 col-md-offset-1">
              <h1 class="text-center">About</h1>

              <div class="bio-pics col-md-3 col-sm-4">
                <img class="bio-pic pic-1" src="images/JH-BW-yard.jpg" alt="Jordan Heider" width="100%" height="auto" />
                <img class="bio-pic pic-2" src="images/JH-CJ.jpg" alt="Jordan Heider CrossFit Green Bay" width="100%" height="auto" />
                <img class="bio-pic pic-3" src="images/JH-Cliff-Runner.jpg" alt="Jordan Heider Cliff Runner 10k 2016" width="100%" height="auto" />
                <img class="bio-pic pic-4" src="images/JH-ToughMudder.jpg" alt="Jordan Heider Tough Mudder 2016" width="100%" height="auto" />
              </div><!-- .col-md-3 .col-sm-4 -->
              <div class="col-md-9 col-sm-8">
        				<dl>
        				<dt>Overview</dt>
        				<dd>I'm a web designer and front-end developer based in Green Bay.
        I'm currently part of the web development team at <a href="https://attainkarma.com" title="The Karma Group" target="_blank">The Karma Group</a>, an advertising agency that builds web and mobile applications for a variety of clients, as well as other types of strategic solutions.
        				</dd>
        				<dt>What I Enjoy</dt>
                <dd>My passion is combining technology and artistry to make compelling web-based projects that are as easy to use as they are enjoyable to look at.<br> <br>Outside of work, I love drawing and painting, running and working out at <a href="https://gbcrossfit.com" target="_blank" title="CrossFit Green Bay">CrossFit Green Bay</a>.
        				</dd>
                <dt>Languages and Frameworks</dt>
                <dd>Javascript, HTML5, CSS3, jQuery, Bootstrap3, PHP, ReactJS</dd>
                <dt>Tools and Expertise</dt>
        				<dd>Git, Responsive Web Design, Front-end programming, WordPress Development, Adobe Creative Suite, MailChimp</dd>
                </dl>
              </div><!-- .col-md-9 .col-sm-8 -->
            </div><!-- col-md-10 col-md-offset-1 -->
          </div><!-- .row -->
        </div><!-- .v-center -->
      </section>
    </div><!-- .row -->


    <div class="row">
      <section id="contact" class="content-box bg-panels-4">
  			<div class="v-center">
        <h1 class="text-center">Contact</h1>
        <div class="row">
          <div id="contactblock" class="col-md-6 col-md-offset-2">
            <div class="form-intro">
              <p class="text-center">Send me a message if you've got a project you'd like some help with, or you just want to say something about the work.</p><p class="text-center">I'm always interested in feedback, or new freelancing opportunities.</p>
            </div><!-- .form-intro -->

            <form id="contact" class="center-block" target="_self" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
              <label><em>All fields are required.</em></label>
              <input type="hidden" name="contact_form_submitted" value="1" id="contact_form_submitted">
              <div class="row">
                <div class="form-group col-md-6">
                  <label class="sr-only" for="firstname">First name</label>
                  <input type="text" class="form-control" id="firstname" name="firstname" placeholder="First name">
                  <span class="error">* $firstnameErr;</span>
                </div><!-- .form-group col-md-3 -->
                <div class="form-group col-md-6">
                  <label class="sr-only" for="lastname">Last name</label>
                  <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Last name">
                  <span class="error">* $lastnameErr;</span>
                </div><!-- .form-group col-md-3 -->
              </div><!-- .row -->
              <div class="row">
                <div class="form-group col-md-12">
                  <label class="sr-only" for="email">Email</label>
                  <input type="email" class="form-control" id="email" name="email" placeholder="Email address">
                  <span class="error">* $emailErr;</span>
                </div><!-- .form-group col-md-6 -->
              </div><!-- .row -->
              <div class="row">
                <div class="form-group col-md-12">
                  <label for="comments"><em>Enter your comments, questions or project information below.</em></label>
                  <textarea name="comments" id="comments" class="form-control" rows="5"></textarea>
                </div><!-- .form-group col-md-3 -->
              </div><!-- .row -->
              <div class="row">
                <div class="form-group col-md-12">
                <button type="submit" name="submit" class="submit center-block btn btn-primary">Submit message</button>
                </div><!-- .form-group col-md-3 -->
              </div><!-- .row -->
            </form>
          </div><!-- .col-md-6 .col-md-offset-2 -->

        <div class="list-inline">
          <div class="col-md-3">
          <p class="connect-header">Other ways to connect:</p>
          <p><a href="https://github.com/Jordash" class="btn btn-custom"><i class="glyphicon fa fa-git-square"></i>  <span>GitHub</span></a></p>
          <p><a href="https://www.linkedin.com/in/jordan-heider/" class="btn btn-custom"><i class="fa fa-linkedin-square"></i> <span>LinkedIn</span></a></p>
          <p><a href="https://www.facebook.com/jordan.heider" class="btn btn-custom"><i class="fa fa-facebook-square"></i> <span>Facebook</span></a></p>
          <p><a href="http://www.freecodecamp.com/jordash" class="btn btn-custom"><i class="fa fa-cog"></i> <span>FreeCodeCamp</span></a></p>
          </div><!-- .col-md-3 -->
          </div><!-- .row list-inline -->
			</div><!-- .v-center -->
    </section>
  </div>


    <section id="footer" class="footer-box text-center">
      <div class="col-md-12">
				<h3 style="color: #e8e8e8">Going Back Up?</h3>
				<a class="btn btn-custom" href="#home" data-id="home">
          <span class="glyphicon glyphicon-chevron-up"></span><br />Home</a>
				<a class="btn btn-custom" href="#about" data-id="about">
          <span class="glyphicon glyphicon-chevron-up"></span><br />About</a>
        <a class="btn btn-custom" href="#portfolio" data-id="portfolio">
          <span class="glyphicon glyphicon-chevron-up"></span><br />Portfolio</a>
        <a class="btn btn-custom" href="#contact" data-id="contact">
          <span class="glyphicon glyphicon-chevron-up"></span><br />Contact</a>
			</div>
    </section>

</div>
</body>
</html>
