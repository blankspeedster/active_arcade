<?php
require_once("process_remedy_pets.php");
include("head.php");
$_SESSION['sidebar'] = "remedy";
?>
<title>
  PawsBook - Pets Remedy
</title>

<body class="g-sidenav-show  bg-gray-200">

  <?php include("aside.php"); ?>

  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <?php include("navbar.php"); ?>
    <!-- End Navbar -->

    <!-- Vue App Here -->
    <span id="vueApp" class="show">

      <!-- Snackbar -->
      <div class="snack-wrap" v-if="showSnackBar" @click="showSnackBar=false">
        <input type="checkbox" class="snackclose animated" id="close" /><label class="snacklable animated" for="close"></label>
        <div class="snackbar animated">
          <p><strong>Notice:</strong> {{snackBarMessage}} <br>
            <span style="font-size: 12px !important;">Click to dismiss.</span>
          </p>
        </div>
      </div>
      <!-- End Snackbar -->

      <div class="container-fluid py-4">

      <div class="row">

        <div class="col-lg-12">
          <div class="row">
            <div class="col-md-12 mb-lg-0 mb-4">
              <div class="card mt-4">
                <div class="card-header pb-0 p-3">
                  <div class="row">
                    <div class="col-6 d-flex align-items-center">
                      <h6 class="mb-0">Vitamin E Oil for Healthy Skin</h6>
                    </div>
                  </div>
                </div>
                <div class="card-body p-3">
                  <div class="row">
                    <div class="col-md-12 mb-md-0 mb-4">
                      <div class="card card-body border card-plain border-radius-lg d-flex align-items-center flex-row">
                      It can be used to moisturize your companion’s dry skin. Veterinarians recommends massaging Vitamin E oil on your dog’s coat. “Vitamin E capsules can also be broken open and used on warts, calluses, or dry spots,” she says, adding that there is no cause for concern if your pet licks off the small amount of the oil.
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-12">
          <div class="row">
            <div class="col-md-12 mb-lg-0 mb-4">
              <div class="card mt-4">
                <div class="card-header pb-0 p-3">
                  <div class="row">
                    <div class="col-6 d-flex align-items-center">
                      <h6 class="mb-0">Electrolyte-Replacing Liquids for Diarrhea</h6>
                    </div>
                  </div>
                </div>
                <div class="card-body p-3">
                  <div class="row">
                    <div class="col-md-12 mb-md-0 mb-4">
                      <div class="card card-body border card-plain border-radius-lg d-flex align-items-center flex-row">
                      Flavorless electrolyte-replacing liquids (such as sports waters or pediatric drinks) not only help athletes to rehydrate and babies to recover from illness, but also can supply your sick pooch's body with much-needed fluid and electrolytes if he’s suffering through a bout of diarrhea.
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-12">
          <div class="row">
            <div class="col-md-12 mb-lg-0 mb-4">
              <div class="card mt-4">
                <div class="card-header pb-0 p-3">
                  <div class="row">
                    <div class="col-6 d-flex align-items-center">
                      <h6 class="mb-0">Yogurt for Dogs</h6>
                    </div>
                  </div>
                </div>
                <div class="card-body p-3">
                  <div class="row">
                    <div class="col-md-12 mb-md-0 mb-4">
                      <div class="card card-body border card-plain border-radius-lg d-flex align-items-center flex-row">
                      Delicious, plain yogurt can be a healthy treat for your dog. The live probiotic organisms in the yogurt may also help keep the bacteria in your dog's intestines in balance. Probiotic supplements for dogs are widely available through veterinarians and over-the-counter.
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-12">
          <div class="row">
            <div class="col-md-12 mb-lg-0 mb-4">
              <div class="card mt-4">
                <div class="card-header pb-0 p-3">
                  <div class="row">
                    <div class="col-6 d-flex align-items-center">
                      <h6 class="mb-0">Chamomile Tea for Upset Stomach and Minor Irritation</h6>
                    </div>
                  </div>
                </div>
                <div class="card-body p-3">
                  <div class="row">
                    <div class="col-md-12 mb-md-0 mb-4">
                      <div class="card card-body border card-plain border-radius-lg d-flex align-items-center flex-row">
                      Chamomile soothes the stomach by decreasing muscle spasms and cramps, Veterinarians says. “It also decreases inflammation of mucous membranes, so it decreases inflammation of the stomach and intestinal lining.” Chamomile tea can be added to dog food or your dog's water bowl, or given by mouth with a syringe.
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-12">
          <div class="row">
            <div class="col-md-12 mb-lg-0 mb-4">
              <div class="card mt-4">
                <div class="card-header pb-0 p-3">
                  <div class="row">
                    <div class="col-6 d-flex align-items-center">
                      <h6 class="mb-0">Chamomile & Herbal Tea Soaks</h6>
                    </div>
                  </div>
                </div>
                <div class="card-body p-3">
                  <div class="row">
                    <div class="col-md-12 mb-md-0 mb-4">
                      <div class="card card-body border card-plain border-radius-lg d-flex align-items-center flex-row">
                      Chamomile, calendula, and green tea have properties that soothe and cool irritated skin. These soaks are best for dogs who have hot, itchy patches of skin that are at risk of getting rubbed raw.<br><br>
                      If your dog is inconsolably itchy all over, fill up your tub or sink with warm water and let several herbal tea bags steep for three minutes. Remove the tea bags and let your dog soak in the bath for at least five minutes.<br><br>
                      Alternatively, for smaller itchy patches, steep one or two tea bags in about two cups of hot water. Once the tea is cooled down, pour it on your dog’s skin as a quick fix, letting it drip dry without rinsing.
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-12">
          <div class="row">
            <div class="col-md-12 mb-lg-0 mb-4">
              <div class="card mt-4">
                <div class="card-header pb-0 p-3">
                  <div class="row">
                    <div class="col-6 d-flex align-items-center">
                      <h6 class="mb-0">50/50 Apple Cider Vinegar Water Spray</h6>
                    </div>
                  </div>
                </div>
                <div class="card-body p-3">
                  <div class="row">
                    <div class="col-md-12 mb-md-0 mb-4">
                      <div class="card card-body border card-plain border-radius-lg d-flex align-items-center flex-row">
                      Apple cider vinegar (ACV) is a natural, safe relief for especially dry, itchy skin. The antiseptic and antifungal nature of apple cider vinegar makes it a great form of relief from poison ivy but NOT on raw or opened skin. (If your dog has itched himself or herself raw, this solution will sting the exposed wound.)<br><br>
                      To avoid getting vinegar in any open cuts, fill a spray bottle with 50% water and 50% ACV to target affected areas. If your dog walked through a patch of poison ivy, oak, or sumac, soak their paws in the solution for up to five minutes.
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-12">
          <div class="row">
            <div class="col-md-12 mb-lg-0 mb-4">
              <div class="card mt-4">
                <div class="card-header pb-0 p-3">
                  <div class="row">
                    <div class="col-6 d-flex align-items-center">
                      <h6 class="mb-0">Oatmeal Bath</h6>
                    </div>
                  </div>
                </div>
                <div class="card-body p-3">
                  <div class="row">
                    <div class="col-md-12 mb-md-0 mb-4">
                      <div class="card card-body border card-plain border-radius-lg d-flex align-items-center flex-row">
                      Oatmeal is an age-old remedy for our dry, itchy skin that happens to be safe for use on our canine friends, too! In fact, most doggie hypoallergenic shampoos include oatmeal as an active ingredient to soothe and fight irritation.
                      <br><br>
                      Start by grinding plain oatmeal into a powder to sprinkle in your dog’s warm bath. The oatmeal will typically take 10 to 15 minutes to cool down red, angry skin no matter the cause. It is also nontoxic, so it’s okay if your pet licks some off during their long bath. If this sounds like a long time for your pup to be in the tub without a struggle, try some of our techniques to Curb Bath Time Fears.
                      Another option to avoid a full-on bath is to make an oatmeal paste. Take your ground oatmeal and add a little bit of water at a time until you are left with a paste that has a spreadable consistency. Target spots that have been bothering your dog and make sure the paste contacts the skin on longer-haired dogs for maximum relief.
                      <br><br>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>


        <div class="col-lg-12">
          <div class="row">
            <div class="col-md-12 mb-lg-0 mb-4">
              <div class="card mt-4">
                <div class="card-header pb-0 p-3">
                  <div class="row">
                    <div class="col-6 d-flex align-items-center">
                      <h6 class="mb-0">Plain, Sugar-Free Yogurt</h6>
                    </div>
                  </div>
                </div>
                <div class="card-body p-3">
                  <div class="row">
                    <div class="col-md-12 mb-md-0 mb-4">
                      <div class="card card-body border card-plain border-radius-lg d-flex align-items-center flex-row">
                      Feeding your dog plain, unsweetened yogurt offers many health benefits. Some yeast infections and skin irritation can stem from your dog’s digestive system. This remedy is good for dogs who have certain rashes, hives, or allergies.
                      <br><br>
                      Feeding small dogs one teaspoon of yogurt and big dogs two teaspoons once a week will improve their overall gut health. Most dogs like the taste of yogurt on its own, but it can also be mixed with food to help digestion.
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-12">
          <div class="row">
            <div class="col-md-12 mb-lg-0 mb-4">
              <div class="card mt-4">
                <div class="card-header pb-0 p-3">
                  <div class="row">
                    <div class="col-6 d-flex align-items-center">
                      <h6 class="mb-0">Coconut Oil</h6>
                    </div>
                  </div>
                </div>
                <div class="card-body p-3">
                  <div class="row">
                    <div class="col-md-12 mb-md-0 mb-4">
                      <div class="card card-body border card-plain border-radius-lg d-flex align-items-center flex-row">
                      Many natural beauty products now contain coconut oil because of its antibacterial and antifungal properties. It is also an excellent moisturizer for canines as the oils can penetrate fur for direct contact to the skin. Dogs who are suffering from eczema, allergies, yeast infections, and even insect bites and stings can all benefit from direct application of coconut oil.
                      <br/><br/><br/>
                      Put coconut oil in the fridge or a cool, dry place so it turns completely solid. For quick relief to dry skin, massage the oil into the coat and skin of your dog where they are suffering. You will notice your dog’s coat improving along with their relief from the constant itching!
                      <br/><br/><br/>
                      These at-home remedies are safe for most dogs and most skin issues; however, you should always consult your veterinarian before using one of these treatments on your pet. A proper diagnosis is key to providing the most effective treatment for your dog’s itchy skin. Once you’ve consulted with your veterinarian, feel free to try any combination of these remedies, as they are all non-toxic and natural!
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>








      </div>


      <div class="row" style="display: none;">
        <div class="col-md-7 mt-4">
          <div class="card">
            <div class="card-header pb-0 px-3">
              <h6 class="mb-0">Billing Information</h6>
            </div>
            <div class="card-body pt-4 p-3">
              <ul class="list-group">
                <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                  <div class="d-flex flex-column">
                    <h6 class="mb-3 text-sm">Oliver Liam</h6>
                    <span class="mb-2 text-xs">Company Name: <span class="text-dark font-weight-bold ms-sm-2">Viking Burrito</span></span>
                    <span class="mb-2 text-xs">Email Address: <span class="text-dark ms-sm-2 font-weight-bold">oliver@burrito.com</span></span>
                    <span class="text-xs">VAT Number: <span class="text-dark ms-sm-2 font-weight-bold">FRB1235476</span></span>
                  </div>
                  <div class="ms-auto text-end">
                    <a class="btn btn-link text-danger text-gradient px-3 mb-0" href="javascript:;"><i class="material-icons text-sm me-2">delete</i>Delete</a>
                    <a class="btn btn-link text-dark px-3 mb-0" href="javascript:;"><i class="material-icons text-sm me-2">edit</i>Edit</a>
                  </div>
                </li>
                <li class="list-group-item border-0 d-flex p-4 mb-2 mt-3 bg-gray-100 border-radius-lg">
                  <div class="d-flex flex-column">
                    <h6 class="mb-3 text-sm">Lucas Harper</h6>
                    <span class="mb-2 text-xs">Company Name: <span class="text-dark font-weight-bold ms-sm-2">Stone Tech Zone</span></span>
                    <span class="mb-2 text-xs">Email Address: <span class="text-dark ms-sm-2 font-weight-bold">lucas@stone-tech.com</span></span>
                    <span class="text-xs">VAT Number: <span class="text-dark ms-sm-2 font-weight-bold">FRB1235476</span></span>
                  </div>
                  <div class="ms-auto text-end">
                    <a class="btn btn-link text-danger text-gradient px-3 mb-0" href="javascript:;"><i class="material-icons text-sm me-2">delete</i>Delete</a>
                    <a class="btn btn-link text-dark px-3 mb-0" href="javascript:;"><i class="material-icons text-sm me-2">edit</i>Edit</a>
                  </div>
                </li>
                <li class="list-group-item border-0 d-flex p-4 mb-2 mt-3 bg-gray-100 border-radius-lg">
                  <div class="d-flex flex-column">
                    <h6 class="mb-3 text-sm">Ethan James</h6>
                    <span class="mb-2 text-xs">Company Name: <span class="text-dark font-weight-bold ms-sm-2">Fiber Notion</span></span>
                    <span class="mb-2 text-xs">Email Address: <span class="text-dark ms-sm-2 font-weight-bold">ethan@fiber.com</span></span>
                    <span class="text-xs">VAT Number: <span class="text-dark ms-sm-2 font-weight-bold">FRB1235476</span></span>
                  </div>
                  <div class="ms-auto text-end">
                    <a class="btn btn-link text-danger text-gradient px-3 mb-0" href="javascript:;"><i class="material-icons text-sm me-2">delete</i>Delete</a>
                    <a class="btn btn-link text-dark px-3 mb-0" href="javascript:;"><i class="material-icons text-sm me-2">edit</i>Edit</a>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-5 mt-4">
          <div class="card h-100 mb-4">
            <div class="card-header pb-0 px-3">
              <div class="row">
                <div class="col-md-6">
                  <h6 class="mb-0">Your Transaction's</h6>
                </div>
                <div class="col-md-6 d-flex justify-content-start justify-content-md-end align-items-center">
                  <i class="material-icons me-2 text-lg">date_range</i>
                  <small>23 - 30 March 2020</small>
                </div>
              </div>
            </div>
            <div class="card-body pt-4 p-3">
              <h6 class="text-uppercase text-body text-xs font-weight-bolder mb-3">Newest</h6>
              <ul class="list-group">
                <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                  <div class="d-flex align-items-center">
                    <button class="btn btn-icon-only btn-rounded btn-outline-danger mb-0 me-3 p-3 btn-sm d-flex align-items-center justify-content-center"><i class="material-icons text-lg">expand_more</i></button>
                    <div class="d-flex flex-column">
                      <h6 class="mb-1 text-dark text-sm">Netflix</h6>
                      <span class="text-xs">27 March 2020, at 12:30 PM</span>
                    </div>
                  </div>
                  <div class="d-flex align-items-center text-danger text-gradient text-sm font-weight-bold">
                    - $ 2,500
                  </div>
                </li>
                <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                  <div class="d-flex align-items-center">
                    <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 p-3 btn-sm d-flex align-items-center justify-content-center"><i class="material-icons text-lg">expand_less</i></button>
                    <div class="d-flex flex-column">
                      <h6 class="mb-1 text-dark text-sm">Apple</h6>
                      <span class="text-xs">27 March 2020, at 04:30 AM</span>
                    </div>
                  </div>
                  <div class="d-flex align-items-center text-success text-gradient text-sm font-weight-bold">
                    + $ 2,000
                  </div>
                </li>
              </ul>
              <h6 class="text-uppercase text-body text-xs font-weight-bolder my-3">Yesterday</h6>
              <ul class="list-group">
                <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                  <div class="d-flex align-items-center">
                    <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 p-3 btn-sm d-flex align-items-center justify-content-center"><i class="material-icons text-lg">expand_less</i></button>
                    <div class="d-flex flex-column">
                      <h6 class="mb-1 text-dark text-sm">Stripe</h6>
                      <span class="text-xs">26 March 2020, at 13:45 PM</span>
                    </div>
                  </div>
                  <div class="d-flex align-items-center text-success text-gradient text-sm font-weight-bold">
                    + $ 750
                  </div>
                </li>
                <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                  <div class="d-flex align-items-center">
                    <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 p-3 btn-sm d-flex align-items-center justify-content-center"><i class="material-icons text-lg">expand_less</i></button>
                    <div class="d-flex flex-column">
                      <h6 class="mb-1 text-dark text-sm">HubSpot</h6>
                      <span class="text-xs">26 March 2020, at 12:30 PM</span>
                    </div>
                  </div>
                  <div class="d-flex align-items-center text-success text-gradient text-sm font-weight-bold">
                    + $ 1,000
                  </div>
                </li>
                <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                  <div class="d-flex align-items-center">
                    <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 p-3 btn-sm d-flex align-items-center justify-content-center"><i class="material-icons text-lg">expand_less</i></button>
                    <div class="d-flex flex-column">
                      <h6 class="mb-1 text-dark text-sm">Creative Tim</h6>
                      <span class="text-xs">26 March 2020, at 08:30 AM</span>
                    </div>
                  </div>
                  <div class="d-flex align-items-center text-success text-gradient text-sm font-weight-bold">
                    + $ 2,500
                  </div>
                </li>
                <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                  <div class="d-flex align-items-center">
                    <button class="btn btn-icon-only btn-rounded btn-outline-dark mb-0 me-3 p-3 btn-sm d-flex align-items-center justify-content-center"><i class="material-icons text-lg">priority_high</i></button>
                    <div class="d-flex flex-column">
                      <h6 class="mb-1 text-dark text-sm">Webflow</h6>
                      <span class="text-xs">26 March 2020, at 05:00 AM</span>
                    </div>
                  </div>
                  <div class="d-flex align-items-center text-dark text-sm font-weight-bold">
                    Pending
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <?php include("footer.php"); ?>
    </div>

      <!-- Start Modal -->
      <!-- Start Accept Modal -->
      <div id="confirm-modal" class="modal fade" role="dialog">
        <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Accept Link Request?</h4>
            </div>
            <div class="modal-body">
              <p>Proceed?</p>
            </div>
            <div class="modal-footer">
              <button type="button" href="#" class="btn btn-success" @click="confirmLinkRequest()" data-dismiss="modal">Confirm</button>
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
          </div>
        </div>
      </div>
      <!-- End Accept Modal -->

      <!-- Start Reject Modal -->
      <div id="reject-modal" class="modal fade" role="dialog">
        <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Reject Link Request?</h4>
            </div>
            <div class="modal-body">
              <p>Proceed? This will delete the link request.</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-success" data-dismiss="modal" @click="deleteLinkRequest()">Confirm</button>
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
          </div>
        </div>
      </div>
      <!-- End Reject Modal -->
      <!-- End Modal -->


    </span>
  </main>
  <?php //include("fixed-plugin.php"); 
  ?>
  <?php include("core-js-files.php"); ?>

</body>
<script>
  new Vue({
    el: "#vueApp",
    data() {
      return {
        isEdit: false,
        caption: null,
        captionHere: null,
        showSnackBar: false,
        snackBarMessage: null,
        addingPost: false,
        btnMessage: "Post",

        //Posts
        userPosts: [],

        //Friends
        friendSuggestions: [],
        linkRequests: [],
        requestId: null,
      }
    },
    methods: {
      editInformation() {
        this.isEdit = !this.isEdit;

      },

      //Post Caption
      async postCaption() {
        this.addingPost = true;
        this.btnMessage = "Posting..."
        const options = {
          method: "POST",
          url: "process_index.php?postCaption=" + <?php echo $_SESSION['user_id']; ?>,
          headers: {
            Accept: "application/json",
          },
          data: {
            caption: this.caption,
          },
        };
        await axios
          .request(options)
          .then((response) => {
            this.showSnackBar = true;
            this.snackBarMessage = response.data.response;
            this.caption = "";
          })
          .catch((error) => {
            console.log('error!')
          });
        this.addingPost = false;
        this.btnMessage = "Post";
        await this.getCaption();
      },

      //Get Friends Lists
      async getFriends() {
        const options = {
          method: "GET",
          url: "process_index.php?getFriends=" + <?php echo $_SESSION['user_id']; ?>,
          headers: {
            Accept: "application/json",
          },
        };
        await axios
          .request(options)
          .then((response) => {
            console.log(response);
            this.friendSuggestions = response.data;
          })
          .catch((error) => {
            this.showSnackBar = true;
            this.snackBarMessage = "There is an error getting the friend suggestion. Please try again.";
          });
      },

      //Get Link Request
      async getLinkRequest() {
        const options = {
          method: "GET",
          url: "process_index.php?getLinkRequest=" + <?php echo $_SESSION['user_id']; ?>,
          headers: {
            Accept: "application/json",
          },
        };
        await axios
          .request(options)
          .then((response) => {
            this.linkRequests = response.data;
          })
          .catch((error) => {
            console.log('There is an error processing the request!');
          });
      },

      //Send Link Request
      async sendRequest(id) {
        this.showSnackBar = true;
        this.snackBarMessage = "Sending Request";
        const options = {
          method: "POST",
          url: "process_index.php?sendRequest=" + <?php echo $_SESSION['user_id']; ?>,
          headers: {
            Accept: "application/json",
          },
          data: {
            from_user_id: <?php echo $_SESSION['user_id']; ?>,
            to_user_id: id,
          },
        };
        await axios
          .request(options)
          .then((response) => {
            this.showSnackBar = true;
            this.snackBarMessage = response.data.response;
          })
          .catch((error) => {
            console.log('There is an error processing the request!');
            this.snackBarMessage = 'There is an error processing the request!';
          });
        await this.getFriends();
      },

      //Initiate ID
      async setRequestId(id) {
        this.requestId = id;
        console.log(this.requestId);
      },

      //Confirm Link Request
      async confirmLinkRequest() {
        console.log('confirmLinkRequest');
        this.showSnackBar = true;
        this.snackBarMessage = "Accepting request...";
        let _to_user_id = <?php echo $_SESSION['user_id']; ?>;
        let _from_user_id = this.requestId;
        const options = {
          method: "POST",
          url: "process_index.php?confirmRequest=" + <?php echo $_SESSION['user_id']; ?>,
          headers: {
            Accept: "application/json",
          },
          data: {
            from_user_id: _from_user_id,
            to_user_id: _to_user_id,
          },
        };
        await axios
          .request(options)
          .then((response) => {
            this.showSnackBar = true;
            this.snackBarMessage = response.data.response;
          })
          .catch((error) => {
            console.log('There is an error processing the request!');
            this.snackBarMessage = 'There is an error processing the request!';
          });

        await this.getLinkRequest();
      },

      //Reject Request
      async deleteLinkRequest() {
        console.log('cancelRequest');
        this.showSnackBar = true;
        this.snackBarMessage = "Rejecting request...";
        let _to_user_id = <?php echo $_SESSION['user_id']; ?>;
        let _from_user_id = this.requestId;
        const options = {
          method: "POST",
          url: "process_index.php?cancelRequest=" + <?php echo $_SESSION['user_id']; ?>,
          headers: {
            Accept: "application/json",
          },
          data: {
            from_user_id: _from_user_id,
            to_user_id: _to_user_id,
          },
        };
        await axios
          .request(options)
          .then((response) => {
            this.showSnackBar = true;
            this.snackBarMessage = response.data.response;
          })
          .catch((error) => {
            console.log('There is an error processing the request!');
            this.snackBarMessage = 'There is an error processing the request!';
          });
        await this.getLinkRequest();
        await this.getFriends();
      },

      //Get Friends Posts
      async getCaption() {
        const options = {
          method: "GET",
          url: "process_index.php?getCaption=" + <?php echo $_SESSION['user_id']; ?>,
          headers: {
            Accept: "application/json",
          },
        };
        await axios
          .request(options)
          .then((response) => {
            this.userPosts = response.data
          })
          .catch((error) => {
            this.showSnackBar = true;
            this.snackBarMessage = "There is an error getting the information. Please try again.";
          });
      },
    },

    async mounted() {
      await this.getCaption();
      await this.getFriends();
      await this.getLinkRequest();
      await this.getCaption();
    }
  });
</script>

</html>