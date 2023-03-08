<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
   <title>Everybody Welcome</title>
   <link href="<?= base_url(); ?>/assets/css/style_theme.css" rel="stylesheet">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

   <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
   <link href="<?= base_url(); ?>/assets/font-awesome/css/font-awesome.css" rel="stylesheet">
   <!-- <meta http-equiv="refresh" content="5"> -->


   <style>
      .fluid-banner {

         background-color: rgb(46, 193, 205);
      }

      .banner-search {
         height: 7rem;
         display: flex;
         align-items: center;
         justify-content: space-between;
         gap: 12%;
      }


      /* input search */

      .search-input::placeholder {
         font-family: Arial, sans-serif;
         font-size: 1.5rem;
         font-weight: bold;
         color: lightblue;
      }


      /* Styles for the loader overlay */

      .overlay-blur {
         background-color: rgba(255, 255, 255, 0.5);
         /* fallback for browsers that don't support backdrop-filter */
         -webkit-backdrop-filter: blur(15px);
         /* for Safari */
         backdrop-filter: blur(15px);
         /* for Chrome */
      }

      .overlay::before {
         content: "";
         display: block;
         position: fixed;
         top: 0;
         left: 0;
         background-color: rgba(0, 0, 0, 0.5);
         /* semi-transparent black */
         z-index: 9999;
      }



      /* container overrides */

      .container {
         max-width: 80vw
      }

      .container-fluid.main-content {
         background-color: rgb(245, 245, 245);
         height: 100vh;
      }

      .v-search-container {
         background-color: white;
      }


      /* loader */
      .overlay {
         position: fixed;
         top: 0;
         left: 0;
         width: 100%;
         height: 100%;
         z-index: 9999;
         background-color: rgba(0, 0, 0, 0.5);
         display: flex;
         justify-content: center;
         align-items: center;
      }

      /* Style the loader */
      .loader {
         display: flex;
         justify-content: center;
         align-items: center;
         flex-direction: column;

      }

      .svg-loader {
         height: 10rem;
         width: 36rem;

      }


      /* list group items */

      .list-group li {
         width: 100%;
         position: relative;
         background-color: white;
         height: 2.5rem;
         transition: 0.3s;
         display: flex;
         vertical-align: middle;
         flex-direction: row;
         flex-basis: fit-content;
         padding: 10px;
         border-bottom: solid 1px rgb(46, 193, 205);

      }

      .list-group li:hover {
         background-color: lightblue;
         transition: 0.3s;
      }

      .list-group li a {
         text-decoration: none;
         color: black;
         padding-left: 10px;
         margin-top: 10px;
         font-size: 1.4rem;
      }

      #socialAccordion .accordion-header button,
      #venueTypeAccordion .accordion-header button,
      #accommodationAccordion .accordion-header button {
         border-radius: 0;
      }

      .accordion-body {
         padding: 0;
      }

      .accordion-button:not(.collapsed) {
         background-color: rgb(46, 193, 205);
         color: white;
      }


      /* Star rating */

      .clip-star {
         background: gold;
         clip-path: polygon(50% 0%, 61% 35%, 98% 35%, 68% 57%, 79% 91%, 50% 70%, 21% 91%, 32% 57%, 2% 35%, 39% 35%);
         display: inline-block;
         height: 2rem;
         width: 2rem;
      }

      .rating {
         align-items: center;
         display: flex;
         justify-content: center;
      }

      .venue-summary {
         display: flex;
         flex-direction: row;
         justify-content: space-between;
         align-content: center;
         align-items: flex-start;
      }

      .access-icon-group {
         display: flex;
         flex-direction: row;
         justify-content: flex-start;
         gap: 5rem;
         color: green
      }


      /* temporary */

      #showLoaderBtn {
         position: fixed;
         bottom: 20px;
         right: 20px;
      }
   </style>
</head>

<body>
   <button type="button" class="btn btn-primary" id="showLoaderBtn">
      Test Loader
   </button>
   <div class="overlay d-none">
      <div class="loader">
         <!-- <h2 class="text-white">Loading...</h3> -->
         <object class="svg-loader" type="image/svg+xml" data="<?= base_url(); ?>/assets/img/vectors/a4a-circles.svg"></object>
      </div>
   </div>

   <nav class="navbar navbar-expand-lg bg-body-tertiary bg-dark">
      <div class="container-fluid">

         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
         </button>

         <div class="collapse navbar-collapse " id="navbarScroll">

            <ul class="navbar-nav ms-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
               <li class="nav-item me-3">
                  <a class="nav-link active btn btn-primary" aria-current="page" href="<?= base_url() ?>/Login">Login / Register</a>
               </li>
               <li class="nav-item me-3">
                  <a class="nav-link active btn btn-outline-secondary btn-success" aria-current="page" href="#">Affiliates</a>

               </li>
            </ul>
         </div>
      </div>
   </nav>

   <div class="container-fluid px-0 fluid-banner">
      <div class="container">
         <div class="banner-search">
            <img src="<?= base_url(); ?>/assets/img/Everybody-Welcome-logo.png" alt="Bootstrap" height="80">

            <div class="input-group">
               <input type="text" placeholder="Search for location..." class="form-control search-input">
               <span class="input-group-append"> <button type="button" class="search-btn btn btn-primary">
                     <i class="fa fa-map-marker fa-3x text-white"></i>
                  </button>
               </span>
            </div>
         </div>
      </div>
   </div>

   <div class="container-fluid main-content">

      <div class="container v-search-container pt-5">

         <div class="row">

            <div class="col-lg-2">
               <div class="ibox">


                  <!-- Venue types -->
                  <div class="accordion" id="venueTypeAccordion">
                     <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                           <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#venueTypeSubMenu" aria-expanded="true" aria-controls="venueTypeSubMenu">
                              Venue Type
                           </button>
                        </h2>
                        <div id="venueTypeSubMenu" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#venueTypeAccordion">
                           <div class="accordion-body">
                              <ul class="list-group">
                                 <li><a href="#" data-venue-type="1075">Museum</a></li>
                                 <li><a href="#" data-venue-type="1075">Theme Park</a></li>
                                 <li><a href="#" data-venue-type="1075">Castles &amp; Stately Homes</a></li>
                                 <li><a href="#" data-venue-type="1075">Gardens, Nature &amp; Open Spaces</a></li>
                                 <li><a href="#" data-venue-type="1075">Places of Worship</a></li>
                                 <li><a href="#" data-venue-type="1075">Zoos &amp; Safari Parks</a></li>
                                 <li><a href="#" data-venue-type="1075">Tourist Attractions</a></li>
                                 <li><a href="#" data-venue-type="1075">Art Gallery</a></li>
                                 <li><a href="#" data-venue-type="1075">Farm</a></li>
                                 <li><a href="#" data-venue-type="1075">Exhibition and Conference Centre</a></li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>



                  <!-- Social -->

                  <div class="accordion" id="socialAccordion">
                     <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                           <button class="accordion-button " type="button" data-bs-toggle="collapse" data-bs-target="#socialSubMenu" aria-expanded="true" aria-controls="socialSubMenu">
                              Social
                           </button>
                        </h2>
                        <div id="socialSubMenu" class="accordion-collapse show " aria-labelledby="headingTwo" data-bs-parent="#socialAccordion">
                           <div class="accordion-body">
                              <ul class="list-group">
                                 <li><a href="#" data-venue-type="1115">Restaurants</a></li>
                                 <li><a href="#" data-venue-type="1115">Pubs &amp; Bars</a></li>
                                 <li><a href="#" data-venue-type="1115">Café, Cafés &amp; Coffee Shops</a></li>
                                 <li><a href="#" data-venue-type="1115">Takeaways &amp; Fast Food</a></li>
                                 <li><a href="#" data-venue-type="1115">Nightclubs</a></li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>

                  <!-- Activities -->

                  <div class="accordion" id="activitiesAccordion">
                     <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                           <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#activitiesSubMenu" aria-expanded="false" aria-controls="activitiesSubMenu">
                              Activities
                           </button>
                        </h2>
                        <div id="activitiesSubMenu" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#activitiesAccordion">
                           <div class="accordion-body">
                              <ul class="list-group">
                                 <li><a href="#" data-venue-type="1120">Art &amp; Design</a></li>
                                 <li><a href="#" data-venue-type="1120">Music &amp; Singing</a></li>
                                 <li><a href="#" data-venue-type="1120">Stadiums &amp; Sports Venues</a></li>
                                 <li><a href="#" data-venue-type="1120">Sport &amp; Exercise</a></li>
                                 <li><a href="#" data-venue-type="1120">Outdoor Activities</a></li>
                                 <li><a href="#" data-venue-type="1120">Cinema</a></li>
                                 <li><a href="#" data-venue-type="1120">Theatres &amp; Concert Halls</a></li>
                                 <li><a href="#" data-venue-type="1120">Casino</a></li>
                                 <li><a href="#" data-venue-type="1120">Bingo</a></li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- Accommodation -->

                  <div class="accordion" id="venueTypeAccordion">
                     <div class="accordion-item">
                        <h2 class="accordion-header" id="headingFour">
                           <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accommodationSubMenu" aria-expanded="false" aria-controls="accommodationSubMenu">
                              Accommodation
                           </button>
                        </h2>
                        <div id="accommodationSubMenu" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#venueTypeAccordion">
                           <div class="accordion-body">
                              <ul class="list-group">
                                 <li><a href="#" data-venue-type="1128">Hotels &amp; Guesthouses</a></li>
                                 <li><a href="#" data-venue-type="1128">Camping &amp; Caravanning</a></li>
                                 <li><a href="#" data-venue-type="1128">Self-Catering</a></li>
                                 <li><a href="#" data-venue-type="1128">Youth Hostels</a></li>
                                 <li><a href="#" data-venue-type="1128">Respite Care</a></li>
                              </ul>
                              <div class="card-footer">Footer</div>
                           </div>
                        </div>
                     </div>
                  </div>



               </div>
            </div>

            <div class="col-lg-10">
               <div class="ibox">
                  <div class="ibox-title">
                     <div class="venue-summary">
                        <h2>Wimpole Hall</h2>
                        <div class="rating">

                           <div class="clip-star"></div>
                           <div class="clip-star"></div>
                           <div class="clip-star"></div>
                           <div class="clip-star"></div>
                           <div class="clip-star"></div>
                        </div>
                     </div>

                  </div>
                  <div class="ibox-content">
                     <div class="row">
                        <div class="col-lg-7">
                           Lorem ipsum dolor sit, amet consectetur adipisicing elit. Animi beatae aliquam ullam odit sapiente id veritatis incidunt ipsam iusto, saepe quo iure nostrum voluptates quam ratione vitae pariatur cumque! Aut.
                           Laborum eos quaerat quo magni illum harum excepturi, ipsa quasi cupiditate ullam inventore eius vitae velit mollitia tempora molestiae. Delectus at aspernatur modi eum. Consequatur similique ipsum eligendi! Facere, ex.
                           Ad dolorum quo, eius, quidem possimus nisi eveniet voluptas adipisci fugit similique at voluptates rem dolore alias! Inventore maxime est dolores dolor nulla molestiae incidunt sequi tempore mollitia ipsum! Corrupti!
                        </div>
                        <div class="col-lg-5">
                           <div class="photos">
                              <a target="_blank" href="#"> <img alt="image" class="feed-photo" src="https://picsum.photos/100?random"></a>
                              <a target="_blank" href="#"> <img alt="image" class="feed-photo" src="https://picsum.photos/100?random"></a>
                              <a target="_blank" href="#"> <img alt="image" class="feed-photo" src="https://picsum.photos/100?random"></a>
                              <a target="_blank" href="#"> <img alt="image" class="feed-photo" src="https://picsum.photos/100"></a>
                           </div>
                        </div>
                     </div>

                     <div class="ibox-footer mt-4">

                        <div class="access-icon-group">
                           <i class="fa fa-3x fa-wheelchair"></i>
                           <i class="fa fa-3x fa-low-vision"></i>
                           <i class="fa fa-3x fa-volume-up"></i>
                        </div>

                     </div>
                  </div>

               </div>
            </div>
         </div>
      </div>
   </div>


   <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
   </script>
   <script>
      // testing loader
      const overlayElement = document.querySelector('.overlay');
      const showLoaderBtn = document.getElementById('showLoaderBtn');

      showLoaderBtn.addEventListener('click', function() {
         overlayElement.classList.remove('d-none');
      });

      overlayElement.addEventListener('click', function() {
         overlayElement.classList.add('d-none');
      });
   </script>
</body>

</html>