
<!DOCTYPE HTML>
<html>
<head>

<!-- Bootstrap v 3.3.7 with SRI -->

<!-- jQuery 3.1.1 with SRI -->
<script
  src="//code.jquery.com/jquery-3.1.1.min.js"
  integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
  crossorigin="anonymous"></script>

<!-- Bootstrap v 3.3.7 with SRI -->

<script type="text/javascript">
 $(document).ready(function(){

    //Inject project info into Modal on click
    $('.projects').on('click', function(){
      var $project = $(this).attr('href');
      console.log($project);
      $("#projectModal .modal-title").text($project);
    })
});
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
					<button type="button" class="navbar-toggle" data-toggle="modal" data-target="#mainNav">
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

      				<div class="col-sm-6 col-md-4 col-lg-3">
      					<div class="portfolio-block">
      						<p class="caption">Mon Amie Boutique</p>
      					<a class="projects" href="#monamie" data-toggle="modal" data-target="#projectModal">mon amie site</a> <a href="#" class="tag" data-tag="design"><span class="glyphicon glyphicon-pencil"></span> Web Design</span></a> <a href="#" class="tag" data-tag="programming"><span class="glyphicon glyphicon-cog"></span> Programming</a>
      					</div><!-- end .portfolio-block -->
      				</div><!-- end grid block -->
      				<div class="col-sm-6 col-md-4 col-lg-3">
      					<div class="portfolio-block">
            			<p class="caption">Marine Travelift</p>
      						<a href="#marinetravelift" data-toggle="modal" data-target="#projectModal"><img src="/PortfolioWork/MarineTravelift-on-12-30-15.jpg" width="100%" height="auto" alt="Marine Travelift website" /></a>
      						<a class="tag" data-tag="design" href="#"><span class="glyphicon glyphicon-pencil"></span>Design</span></a>
      					</div><!-- end .portfolio-block -->
      				</div><!-- end grid block -->
      			<div class="col-sm-6 col-md-4 col-lg-3">
      				<div class="portfolio-block">
            		<p class="caption">Anchor Glass</p>
      					<a href="http://anchorglass.com"><img src="https://dl.dropboxusercontent.com/u/17495915/PortfolioWork/AnchorGlass-on-12-30-15.jpg" width="100%" height="auto" alt="Anchor Glass website" /></a>
      					<a href="#" class="tag" data-tag="design"><span class=" glyphicon glyphicon-pencil"></span>Design</span></a>
      				</div><!-- end .portfolio-block -->
      			</div><!-- end grid block -->
      			<div class="col-sm-6 col-md-4 col-lg-3">
      				<div class="portfolio-block">
            		<p class="caption">Expera Specialty Solutions</p>
      					<a href="http://experaspecialty.com"><img src="/PortfolioWork/Expera-on-12-30-15.jpg" width="100%" height="auto" alt="Expera Specialty Solutions website" /></a> <a href="#" class="tag" data-tag="design"><span class="glyphicon glyphicon-pencil"></span> Design</span></a>
      					<a href="#" class="tag" data-tag="programming"><span class="glyphicon glyphicon-cog"></span> Programming</a>
      				</div><!-- end .portfolio-block -->
      			</div><!-- end grid block -->
      			<div class="col-sm-6 col-md-4 col-lg-3">
      				<div class="portfolio-block">
            		<p class="caption">Fuel Cost Secrets</p>
      					<img src="/PortfolioWork/BreakThroughFuel-1-7-16.jpg" width="100%" height="auto" alt="Breakthrough Fuel - Fuel Cost Secrets website" /></a> <a href="#" class="tag" data-tag="design"><span class="glyphicon glyphicon-pencil"></span>Design</span></a>
      				</div><!-- end .portfolio-block -->
      			</div><!-- end grid block -->
            <div class="col-sm-6 col-md-4 col-lg-3">
      				<div class="portfolio-block">
            		<p class="caption">Fuel Cost Secrets</p>
      					<img src="/PortfolioWork/BreakThroughFuel-1-7-16.jpg" width="100%" height="auto" alt="Breakthrough Fuel - Fuel Cost Secrets website" /></a> <a href="#" class="tag" data-tag="design"><span class="glyphicon glyphicon-pencil"></span>Design</span></a>
      				</div><!-- end .portfolio-block -->
      			</div><!-- end grid block -->
            <div class="col-sm-6 col-md-4 col-lg-3">
      				<div class="portfolio-block">
            		<p class="caption">Ice Bowl 2017</p>
      					<img src="/PortfolioWork/BreakThroughFuel-1-7-16.jpg" width="100%" height="auto" alt="CrossFit Green Bay - Ice Bowl 2017" /></a> <a href="#" class="tag" data-tag="design"><span class="glyphicon glyphicon-pencil"></span>Design</span></a>
      				</div><!-- end .portfolio-block -->
      			</div><!-- end grid block -->
            <div class="col-sm-6 col-md-4 col-lg-3">
      				<div class="portfolio-block">
            		<p class="caption">Ice Bowl 2016</p>
      					<img src="/PortfolioWork/BreakThroughFuel-1-7-16.jpg" width="100%" height="auto" alt="CrossFit Green Bay - Ice Bowl 2016" /></a> <a href="#" class="tag" data-tag="design"><span class="glyphicon glyphicon-pencil"></span>Design</span></a>
      				</div><!-- end .portfolio-block -->
      			</div><!-- end grid block -->
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

              <div class="col-md-3 col-sm-4">
                <img class="bio-pic" src="https://dl.dropboxusercontent.com/u/17495915/PortfolioWork/JH-BW-yard.jpg" alt="Jordan Heider" width="100%" height="auto" />
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
        <div class="col-md-6 col-md-offset-2">
          <div class="form-intro">
            <p class="text-center">Send me a message if you've got a project you'd like some help with, or you just want to say something about the work.</p><p class="text-center">I'm always interested in feedback, or new freelancing opportunities.</p>
          </div><!-- .form-intro -->
          <em>All fields are required.</em>
          <form id="contact" class="center-block" target="_self" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
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
          <p><a href="https://www.linkedin.com/in/jpheider" class="btn btn-custom"><i class="fa fa-linkedin-square"></i> <span>LinkedIn</span></a></p>
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
				<a class="btn btn-custom" href="#home" data-id="home"><span class="glyphicon glyphicon-chevron-up"></span> <br />Home</a>
				<a class="btn btn-custom" href="#about" data-id="about"><span class="glyphicon glyphicon-chevron-up"></span> <br />About</a><a class="btn btn-custom" href="#portfolio" data-id="portfolio"><span class="glyphicon glyphicon-chevron-up"></span> <br />Portfolio</a><a class="btn btn-custom" href="#contact" data-id="contact"><span class="glyphicon glyphicon-chevron-up"></span> <br />Contact</a>
			</div>
    </section>

</div>
</body>
</html>
