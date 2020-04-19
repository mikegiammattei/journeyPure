<?php
/*
 * Template Name: Press Page
 */

include_once(get_stylesheet_directory() . '/classes/Homepage.php');
include_once(get_stylesheet_directory() . '/classes/PressPage.php');
$PressPage = new Pages\PressPage();

/** Page specific js*/
$jsFile = 'rehab-location';

get_header();

?>
<div id="press-page">
	<main>
		<?php $restApiPath = 'http://journeypure.net/rest-api'; ?>
		<section class="above-fold">
			<div class="default-container x-loc lazy" style="padding-top:300px;  background-image: url(/wp-content/uploads/2020/04/jp-river-header-2048x769-1.jpg);">
			</div>
		</section>
		<section class="block-2">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-sm-12" style="padding: 20px;background-color: #ebebeb;">	
                        <div class="press-contact-box">
                            <div class="container">
                                <div class="row">
                                    <div class="col-9">
                                        <p style="padding:0;font-family:Roboto,sans-serif;">PRESS CONTACT</p>
                                        <p style="padding:0;font-family:Roboto,sans-serif;"><strong>Tim Stoddart</strong></p>
                                        <p style="padding:0;font-family:Roboto,sans-serif;"><a href="tel:(413) 244-8994">(413) 244-8994</a></p>
                                        <p style="padding:0;font-family:Roboto,sans-serif;"><a href="mailto:digitalmarketing@journeypure.com">Email Me</a></p>
                                    </div>
                                    <div class="col-3">
                                        <img data-src="/wp-content/uploads/2020/04/tim-headshot-square.jpg" class="lazy" alt="Headshot of JourneyPure press contact"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="press-address-box">
                            <div class="container">
                                <div class="row" style="padding-top:20px;">
                                    <div class="col-4">
                                        <p><a href="address.com" style="padding:0;font-family:Roboto,sans-serif;">Website</a></p>
                                    </div>
                                    <div class="col-8">
                                        <p><a href="https://journeypure.com/">JourneyPure.com</a></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <p style="padding:0;font-family:Roboto,sans-serif;">Social</p>
                                    </div>
                                    <div class="col-8">
                                        <a href="address.com"><i class="fab fa-facebook-square" style="font-size: 40px;padding-right: 10px;" aria-hidden="true"></i></a>
                                        <a href="address.com"><i class="fab fa-linkedin" style="font-size: 40px;padding-right: 10px;" aria-hidden="true"></i></a>
                                        <a href="address.com"><i class="fab fa-twitter-square" style="font-size: 40px;padding-right: 10px;" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <p style="padding:0;font-family:Roboto,sans-serif;">Corporate</p>
                                    </div>
                                    <div class="col-8">
                                        <p>624 Grassmere Park
                                        <br>Nashville, TN 37211
                                        <br>United States</p>
                                    </div>
                                </div>
								<div class="row">
                                    <div class="col-4">
                                        <p style="padding:0;font-family:Roboto,sans-serif;">Other Main Locations</p>
                                    </div>
                                    <div class="col-8">
                                        <p>Murfreesboro, TN<br>
										Knoxville, TN<br>
										Bowling Green, KY<br>
										Panama City Beach, FL<br>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                       
					</div>
                    <div class="col-lg-9 col-sm-12">
                        <div class="press-story-box">
                            <h5 class="h1">Our Story</h5>
                            <p>CEO Kevin Lee started JourneyPure on a mission to revolutionize addiction treatment. The concept was simple. Be in-network with insurance companies. Retain nationally-recognized professionals. And, constantly innovate using data.</p>
							<p>Dr. Loyd M.D. and Dr. Wind Ph.D. are the medical and clinical leadership of JourneyPure. Dr. Loyd is a former national Drug Czar. His 22 years of medical expertise and personal story of a doctor in addiction has been referenced in everything from NPR and the CBS Evening News to the book Dopesick.  Dr. Wind is an adjunct professor and published researcher at Vanderbilt University with 16 years of experience and his own personal story of recovery.</p>							
                            <p>JourneyPure currently has 19 locations across the country and employs around 300 people.</p>
							<p>Our trending topics:</p>
                            <ul>
                                <li>Virtual reality treatment in addiction and PTSD</li>
                                <li>Tips for coping with mental health issues and recovery during quarantine</li>
                                <li>April 10, 2020 recovery during quarantine survey results</li>
                                <li>JourneyPure technologies helping during quarantine - VR, app, telehealth, e-prescriptions, Ask Our Doctors forum</li>
								<li>Local mental health experts in Rutherford County, Knox County, Warren County and Bay county</li>
                            </ul>
                     
                        </div>
                    </div>
				</div>
			</div>
		</section>
		<section class="review-section" style="margin-top: 50px;padding: 50px 0px;">
			<div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="container">
                            <div class="row">
                                <div class="col-xs-12 col-sm-3 col-md-3">
                                    <img data-src="/wp-content/uploads/2020/04/nyt-square.jpg" class="lazy" alt="News Icon"/>
                                </div>
                                <div class="col-xs-12 col-sm-9 col-md-9">
                                    <div class="h5">THE NEW YORK TIMES</div>
                                    <div class="h5"><a href="https://www.nytimes.com/2018/12/29/health/opioid-rehab-abstinence-medication.html" target="_blank">In Rehab, 'Two Warring Factions': Abstinence vs. Medication</a> (Front Page)</div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="container">
                            <div class="row">
                                <div class="col-xs-12 col-sm-3 col-md-3">
                                    <img data-src="/wp-content/uploads/2020/04/ts-square.jpg" class="lazy" alt="News Icon"/>
                                </div>
                                <div class="col-xs-12 col-sm-9 col-md-9">
                                    <div class="h5">TODAY SHOW</div>
                                    <div class="h5"><a href="https://www.today.com/news/your-doctor-stoned-physicians-substance-abuse-problems-continue-work-1D79801891" target="_blank">Is your doctor stoned? Physicians with substance abuse problems continue to work</a> (Dr. Loyd)</div>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="container">
                            <div class="row">
                                <div class="col-xs-12 col-sm-3 col-md-3">
                                    <img data-src="/wp-content/uploads/2020/04/am-square.jpg" class="lazy" alt="News Icon"/>
                                </div>
                                <div class="col-xs-12 col-sm-9 col-md-9">
                                    <div class="h5">AUTHORITY MAGAZINE</div>
                                    <div class="h5"><a href="https://medium.com/authority-magazine/5-things-you-should-do-to-optimize-your-wellness-after-retirement-with-dr-brian-wind-and-beau-7f1f62f5dc13" target="_blank">5 Things You Should Do to Optimize Your Wellness After Retirement</a> (Dr. Wind)</div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="container">
                            <div class="row">
                                <div class="col-xs-12 col-sm-3 col-md-3">
                                    <img data-src="/wp-content/uploads/2020/04/nbj-square.jpg" class="lazy" alt="News Icon"/>
                                </div>
                                <div class="col-xs-12 col-sm-9 col-md-9">
                                    <div class="h5">NASHVILLE BUSINESS JOURNAL</div>
                                    <div class="h5"><a href="https://www.bizjournals.com/nashville/blog/health-care/2015/04/booming-addiction-treatment-industry-gets-another.html" target="_blank">Booming Addiction-Treatment Industry Gets Another Nashville Player</a> (Kevin Lee)</div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
			</div>
		</section>
        <section class="bio-section" style="margin-top: 50px;padding: 50px 0px;">
            <style>

                .img-box {
                    margin: -27px;
                    padding: 20px;
                }
                .img {
                    background: no-repeat center;
                    -webkit-background-size: cover;
                    -moz-background-size: cover;
                    -o-background-size: cover;
                    background-size: cover;
                    width: 100px;
                    height: 100px;
                    border-radius: 50%;
                    display: block;
                    margin: 5px auto 25px;
                }
                .press-bio-slider .card .bios .text {
                    padding-bottom: 0;
                    font-family: "Montserrat",sans-serif;
                }

                .press-bio-slider .card .bios .name-text {
                    color: #000;
                    font-weight: bold;
                }

                .press-bio-slider .card .bios .fa-ul i {
                    color: #00953b;
                }

            </style>
            <div class="container">
                <div class="heading">
                    <h2 class="h1">The Leadership Team</h2>
                </div>
                <div id="press-bio-slider" class="about-bio-slider" data-slick='{"slidesToShow":<?php echo (count($PressPage->bios->bios) < 3) ? count($PressPage->bios->bios) : 3; ?>}'>
                    <?php  foreach ($PressPage->bios->bios as $index => $bio): ?>
                        <div class="card default border-0">
                            <div class="card-body bios">
                                <div class="img-box">
                                    <div class="img" style='background-image: url("<?php echo $bio->photo['image']; ?>");'></div>
                                </div>
                                <div class="header">
                                    <p class="text name-text"><?php echo $bio->name; ?> <span class="text"> • <?php echo $bio->credentials; ?></span></p>
                                    <p class="text"><?php echo $bio->title; ?></p>
                                    <hr />
                                </div>
                                <p class="bio-long"><?php echo ($bio->qualifications) ? '<span class="fa-li"><i class="fas fa-folder-plus"></i></span>' . $bio->qualifications . '': ''; ?></p>

                                <ul class="fa-ul">
                                    <?php echo ($bio->years) ? '<li><span class="fa-li"><i class="fas fa-clock"></i></span>' . $bio->years . ' years in the field</li>': ''; ?>
                                    <?php echo ($bio->education) ? '<li><span class="fa-li"><i class="fas fa-graduation-cap"></i></span>' . $bio->education . '</li>': ''; ?>
                                    <?php echo ($bio->specialty) ? '<li><span class="fa-li"><i class="fas fa-star"></i></span>' . $bio->specialty . '</li>': ''; ?>

                                    <?php
                                    if(!empty($bio->recovery_status)):
                                        switch ($bio->recovery_status):
                                            case 'person' :
                                                echo '<li><span class="fa-li"><i class="fas fa-grin"></i></span>In Recovery</li>';
                                                break;
                                            case 'loved_one' :
                                                echo '<li><span class="fa-li"><i class="fas fa-grin"></i></span>Loved One In Recovery</li>';
                                                break;
                                        endswitch;
                                    endif;
                                    ?>

                                </ul>
                                <span><?php echo ($bio->news_mentions) ? 'News Mentions': ''; ?></span>
                                <?php if(!empty($bio->news_mentions)): ?>
                                    <div id="bio-new-mentions-<?php echo $index; ?>" class="bio-new-mentions" data-slick='{"slidesToShow": <?php echo (count($bio->news_mentions) < 3) ? count($bio->news_mentions) : 3; ?>}'>
                                        <?php foreach ($bio->news_mentions as $news_mention) : ?>
                                            <div class="mention">
                                                <?php if(!empty($news_mention['mention'])): ?>
                                                    <a href="<?php  echo  $news_mention['link_to_article']; ?>" target="_blank"><div class="content"><?php echo  $news_mention['mention']; ?></div></a>
                                                <?php endif; ?>

                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                    <div class="row justify-content-between">
                                        <div class="col-6">
                                            <small class="link see-more-mentions has-more"><data>Data Generated Via Script</data> More Articles ▼ </small>
                                        </div>
                                        <div class="col-6 text-right">
                                            <small class="link see-less-mentions">▲ Back</small>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="clearfix"></div>
                
            </div>
        </section>
        <section class="block-3" style="background: #ebebeb;margin-top: 50px;padding: 50px 0px;">
			<div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <h5 class="h1">Logo Downloads</h5>
                                    <p>Download our logo files here.</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                <a href="/wp-content/uploads/2020/04/JP-logo-color-CMYK.pdf" target="_blank">JourneyPure logo - Color <i class="fas fa-download"></i></a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                <a href="/wp-content/uploads/2020/04/JP-logo-white.pdf" target="_blank">JourneyPure logo - White <i class="fas fa-download"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                    <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <h5 class="h1">Photo Downloads</h5>
                                    <p>Download selected photos and headshot files here.</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4" style="padding-top:10px;padding-bottom:10px;">
                                    <a href="/wp-content/uploads/2020/04/JOURNEYPURE-27.jpg" target="_blank"><img data-src="/wp-content/uploads/2020/04/JOURNEYPURE-27.jpg" class="lazy" alt="JourneyPure Logo - Color"/></a>
                                </div>
                                <div class="col-4" style="padding-top:10px;padding-bottom:10px;">
                                    <a href="/wp-content/uploads/2020/04/JOURNEYPURE-75.jpg" target="_blank"><img data-src="/wp-content/uploads/2020/04/JOURNEYPURE-75.jpg" class="lazy" alt="JourneyPure Logo - White"/></a>
                                </div>
                                <div class="col-4" style="padding-top:10px;padding-bottom:10px;">
                                    <a href="/wp-content/uploads/2020/04/0I1A5420-950x633-1.jpg" target="_blank"><img data-src="/wp-content/uploads/2020/04/0I1A5420-950x633-1.jpg" class="lazy" alt="JourneyPure Logo - White"/></a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4" style="padding-top:10px;padding-bottom:10px;">
                                    <a href="/wp-content/uploads/2020/04/DSC_2491-1800x1200-1.jpg" target="_blank"><img data-src="/wp-content/uploads/2020/04/DSC_2491-1800x1200-1.jpg" class="lazy" alt="JourneyPure Logo - Color"/></a>
                                </div>
                                <div class="col-4" style="padding-top:10px;padding-bottom:10px;">
                                    <a href="/wp-content/uploads/2020/04/DSC_2498-1500x1000-1.jpg" target="_blank"><img data-src="/wp-content/uploads/2020/04/DSC_2498-1500x1000-1.jpg" class="lazy" alt="JourneyPure Logo - White"/></a>
                                </div>
                                <div class="col-4" style="padding-top:10px;padding-bottom:10px;">
                                    <a href="/wp-content/uploads/2020/04/5-HighRes1500x1000.jpg" target="_blank"><img data-src="/wp-content/uploads/2020/04/5-HighRes1500x1000.jpg" class="lazy" alt="JourneyPure Logo - White"/></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
		</section>
        <section class="block-3" style="margin-top: 50px;padding: 50px 0px;">
			<div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <h5 class="h1">Press Releases</h5>
                                    <p>Our most recent press releases are available for download below.</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-3 col-md-3">
                                                <img data-src="/wp-content/uploads/2019/11/favicon-bird-270x270.png" class="lazy" alt="News Icon"/>
                                            </div>
                                            <div class="col-xs-12 col-sm-9 col-md-9">
                                                <div class="h5">Date Here</div>
                                                <div class="h5"><a href="https://www.nytimes.com/2018/12/29/health/opioid-rehab-abstinence-medication.html" target="_blank">Press Release Title</a></div>
                                            </div>
                                        </div>
                                    </div> 
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-3 col-md-3">
                                                <img data-src="/wp-content/uploads/2019/11/favicon-bird-270x270.png" class="lazy" alt="News Icon"/>
                                            </div>
                                            <div class="col-xs-12 col-sm-9 col-md-9">
                                                <div class="h5">Date Here</div>
                                                <div class="h5"><a href="https://www.nytimes.com/2018/12/29/health/opioid-rehab-abstinence-medication.html" target="_blank">Press Release Title</a></div>
                                            </div>
                                        </div>
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
		</section>
		<section class="block-4">
			<div class="container">
				<div class="service-container">
					<h5 class="heading">Our Locations</h5>
					<div class="row">
						<div class="col-md-3">
							<div class="box">
                                <a href="/locations/tennessee/" target="_blank" style="color:white;">
								    <i class="fas fa-clinic-medical"></i>  Tennessee Rehabs
                                </a>
							</div>
						</div>
                        <div class="col-md-3">
							<div class="box">
                                <a href="/locations/kentucky/" target="_blank" style="color:white;">
								    <i class="fas fa-clinic-medical"></i>  Kentucky Rehabs
                                </a>
							</div>
						</div>
                        <div class="col-md-3">
							<div class="box">
                                <a href="/locations/florida/" target="_blank" style="color:white;">
								    <i class="fas fa-clinic-medical"></i>  Florida Rehabs
                                </a>
							</div>
						</div>
						<div class="col-md-3">
							<div class="box">
                                <a href="/locations/" target="_blank" style="color:white;">
								    <i class="fas fa-home"></i>  Outpatient Rehabs
                                </a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</main>
</div>
<?php get_footer(); ?>
