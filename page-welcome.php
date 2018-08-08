<?php 
$container   = get_theme_mod( 'understrap_container_type' );
  get_header();
          if (is_user_logged_in()) :
            echo dashBoardDetails();
          else :
        ?>
    <div class="wrapper" id="page-wrapper">
        <div class="<?php echo esc_html( $container ); ?>" id="content" tabindex="-1">
            <div class="row">
                <!-- Do the left sidebar check -->
                <div id="primary" class="content-area col py-5">
                    <main class="site-main" id="main">
                        <?php while ( have_posts() ) : the_post(); ?> Test
                            <div class="modal" tabindex="-1" role="dialog">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Please Log in</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Modal body text goes here.</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary">Save changes</button>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endwhile; // end of the loop. ?>
                    </main>
                    <!-- #main -->
                </div>
                <!-- #primary -->
            </div>
            <!-- .row -->
        </div>
        <!-- Container end -->
    </div>
    <?php 
          endif;
          get_footer();
  /*
  Function to print user dashboard details
  */
  function dashBoardDetails(){

      // get logged in users details
      $contactDetails = getContactDetailsForDashboard();

      $greeting     = $contactDetails['first_name'];
      $name         = $contactDetails['display_name'];
      $address_block = nl2br(CRM_Utils_Address::format($contactDetails));
      $phone        = $contactDetails['phone'];
      $email        = $contactDetails['email'];
      $membership   = !empty($contactDetails['api.Membership.get']['values'])?$contactDetails['api.Membership.get']['values'][0]['membership_name']:'';

      // all branches of logged in officer
      $branches = $contactDetails['branches'];

      // display stats & buttons for each branch
      $branchesDetails = '';

      // Profile search hidden filter id to be passed with link
      $fid = CRM_Core_DAO::getFieldValue('CRM_Core_DAO_CustomField', CUSTOM_FIELD_FILTER_MEMBER_BRANCH_ID_NAME, 'id', 'name');
      $partyfid = CRM_Core_DAO::getFieldValue('CRM_Core_DAO_CustomField', CUSTOM_FIELD_FILTER_MEMBER_PARTY_ID_NAME, 'id', 'name');

      // If the logged in user has following permissions
        //  - 'edit all contacts'
        //  - 'view all contacts'
      // Display just the member stats : ELSE Display stats with button linked to details page
      $isAdmin = FALSE;
      if ( CRM_Core_Permission::check('edit all contacts') || CRM_Core_Permission::check('view all contacts') ) {
        $isAdmin = TRUE;
      }

      foreach ($branches as $key => $branch) {

        $allBranchMembers = $branch['no_of_all_members'];
        $newBranchMembers = $branch['no_of_new_members'];
        // branch_id
        $branchId = $branch['contact_id'];

        // If admin user with view/edit all contacts permission, display just the stats
        if ($isAdmin) {
          $allMemberStats = <<<EOT
          <span>
            All Members  <span class="badge badge-secondary">{$allBranchMembers}</span>
          </span>
EOT;
          $newMemberStats = <<<EOT
          <span>
            New Members  <span class="badge badge-info">{$newBranchMembers}</span>
          </span>
EOT;
        } else {
          // Hidden filter with branch Id
          $hiddenFilter = '';
          if ($fid) {
            $hiddenFilter = '&custom_'.$fid.'='.$branchId;
          }

          // Stats with buttons linked to respective details page
          $allMemberStats = <<<EOT
          <a href="/branch-member-details?members=all{$hiddenFilter}" class="gform_button button center btn btn-outline-secondary">
            All Branch Members  <span class="badge badge-pill badge-secondary badge-default">{$allBranchMembers}</span>
          </a>
EOT;
          $newMemberStats = <<<EOT
          <a href="/branch-member-details?members=new{$hiddenFilter}" class="gform_button button center btn btn-info">
            New Branch Members  <span class="badge badge-pill badge-light badge-default">{$newBranchMembers}</span>
          </a>
EOT;
        }

        // create stats panel for each branch
        $branchDetails = <<<EOT
        <!--<div class="branch-box text-center row">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title"><strong>{$branch['display_name']}</strong></h3>
            </div>
            <div class="branch-box row">
              <div class="col-md-6">
                {$allMemberStats}
              </div>
              <div class="col-md-6">
                {$newMemberStats}
              </div>
            </div>
          </div>
        </div>-->

        <div class="branch-box text-center row">
          <div class="card my-2">
            <div class="card-header">
              <h3 class="card-title">{$branch['display_name']}</h3>
            </div>
            <div class="branch-box row py-2">
              <div class="col-md-6">
                {$allMemberStats}
              </div>
              <div class="col-md-6">
                {$newMemberStats}
              </div>
            </div>
          </div>
        </div>

EOT;
        // combine all branches stats
        $branchesDetails = $branchesDetails.$branchDetails;
      }

      // Notify, if no branches found for a branch officer
      if (empty($branchesDetails)) {
        $branchesDetails = <<<EOT
        <div class="alert alert-info" role="alert"><i class="fa fa-exclamation-triangle"></i> You don't have access to any branches !</div>
EOT;
      }
			
			// RS: Display parties list for Party Council members
			$partiesHtml = '';
			if (current_user_can(WP_ROLE_PARTY_COUNCIL)) {
				// all parties of logged in officer
				$parties = $contactDetails['parties'];
				
				// display stats & buttons for each branch
				$partiesDetails = '';
				
				foreach ($parties as $key => $party) {

					$allPartyMembers = $party['no_of_all_members'];
					$newPartyMembers = $party['no_of_new_members'];
					// branch_id
					$partyId = $party['contact_id'];

					// If admin user with view/edit all contacts permission, display just the stats
					if ($isAdmin) {
						$allPartyMemberStats = <<<EOT
						<span>
							All Members  <span class="badge badge-pill badge-default badge-secondary">{$allPartyMembers}</span>
						</span>
EOT;
						$newPartyMemberStats = <<<EOT
						<span>
							New Members  <span class="badge badge-pill badge-default badge-info">{$newPartyMembers}</span>
						</span>
EOT;
					} else {

            // Hidden filter with branch Id
            $hiddenFilter = '';
            if ($partyfid) {
              $hiddenFilter = '&custom_'.$partyfid.'='.$partyId;
            }

						// Hidden filter with party id
						//$hiddenFilter = '&party_id='.$partyId;
						
						// Stats with buttons linked to respective details page
						$allPartyMemberStats = <<<EOT
						<a href="/party-member-details?members=all{$hiddenFilter}" class="gform_button button center btn btn-outline-secondary">
							All Members  <span class="badge badge-pill badge-secondary badge-default">{$allPartyMembers}</span>
						</a>
EOT;
						$newPartyMemberStats = <<<EOT
						<a href="/party-member-details?members=new{$hiddenFilter}" class="gform_button button center btn btn-info">
							New Members  <span class="badge badge-pill badge-light badge-default">{$newPartyMembers}</span>
						</a>
EOT;
					}

					// create stats panel for each party
					$partyDetails = <<<EOT
					<!--<div class="branch-box text-center row">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title"><strong>{$party['display_name']}</strong></h3>
							</div>
							<div class="branch-box row">
								<div class="col-md-6">
									{$allPartyMemberStats}
								</div>
								<div class="col-md-6">
									{$newPartyMemberStats}
								</div>
							</div>
						</div>
					</div>-->

          <div class="branch-box text-center row">
            <div class="card my-2">
              <div class="card-header">
                <h3 class="card-title">{$party['display_name']}</h3>
              </div>
              <div class="branch-box row py-2">
                <div class="col-md-6">
                  {$allPartyMemberStats}
                </div>
                <div class="col-md-6">
                  {$newPartyMemberStats}
                </div>
              </div>
            </div>
          </div>
EOT;
					// combine all branches stats
					$partiesDetails = $partiesDetails.$partyDetails;
				}
				
				$partiesHtml = <<<EOT
				<style>
				.list-group-party {
					min-height:50px !important;
				}
				</style>
				
          <div class="list-group list-group-party">
            <li class="list-group-item active">Your Parties</li>
            {$partiesDetails}
          </div>
        
EOT;
			}

      // user details to be printed on dashboard
      $userDetails =  <<<EOT
      <style>
        .veda-crm {
          font-family: "Open Sans";
        }

        .veda-crm .list-group{
          border: 1px solid #5b1973;
        }

        .veda-crm .gform_button{
          float: none;
          margin:5px 0 5px;
          font-size: 1rem;
        }

        .veda-crm .branch-box{
          padding: 5px 5%;
        }

        .veda-crm .panel{
          background-color: #fff;
        }

        .veda-crm .alert{
          margin: 25% 20px;
        }

        .list-group-item {
          display: block;
        }
        .list-group-item p {
        margin-bottom:0;
        }
        .badge-default {
          border-radius: 10px;
          font-size: 16px;
        }

        .card {
          width: 100%;
        }

        .card-title {
          font-size: 21px;
          margin-bottom:0;
        }

        .card-heading {
          background-color: #f5f5f5;
          border-color: #dddddd;
          color: #333333;
          padding: 12px 18px;
        }

      </style>
                 
      <div class="jumbotron text-white bg-primary">
        <div class="container">
            <div class="d-flex">
                <div class="mr-lg-5">
                    <h2 class="page-title display-3 balance-text" style="">
                            Officer dashboard</h2>
                  <div class="d-lg-block d-none"><p class="lead"><strong>Welcome {$greeting}</strong><div class="balance-text">As a Party officer, your access to the Officer Dashboard enables you to view and access membership data and download lists of members.</div></p><p class="balance-text">Your access to this data is governed by the <a class="text-white" href="https://party.coop/briefing/protecting-our-members-data/">Party's Guidance on data protection</a> and our <a class="text-white" href="https://party.coop/privacy">privacy policy</a>. If you have any questions or issues with using this service, contact <a class="text-white" href="mailto:membership@party.coop">Membership</a></p></div>                </div>
                            </div>
        </div>
    </div> <div class="fullwidth" id="main">
                <div class="container py-5">
                    <div class="row">
                        <div class="col-md-12 content">
      <div class='row veda-crm'>
        <div class='col-md-6'>
          <div class="list-group">
            <li class="list-group-item active">Your Details</li>
            <li class="list-group-item">
              <div class="row">
                <div class="col-md-4">
                  <p><strong>Name</strong></p>
                </div>
                <div class="col-md-8">
                  {$name}
                </div>
              </div>
            </li>
            <li class="list-group-item">
              <div class="row">
                <div class="col-md-4">
                  <p><strong>Address</strong></p>
                </div>
                <div class="col-md-8">
                  {$address_block}
                </div>
              </div>
            </li>
            <li class="list-group-item">
              <div class="row">
                <div class="col-md-4">
                  <p><strong>Phone</strong></p>
                </div>
                <div class="col-md-8">
                  {$phone}
                </div>
              </div>
            </li>
            <li class="list-group-item">
              <div class="row">
                <div class="col-md-4">
                  <p><strong>Email</strong></p>
                </div>
                <div class="col-md-8">
                  {$email}
                </div>
              </div>
            </li>
            <li class="list-group-item">
              <div class="row">
                <div class="col-md-4">
                  <p><strong>Membership</strong></p>
                </div>
                <div class="col-md-8">
                  {$membership}
                </div>
              </div>
            </li>
          </div>
        </div>
				<div class='col-md-6'>
          {$partiesHtml}
          <div class="list-group ">
            <li class="list-group-item active">Your Branches</li>
            {$branchesDetails}
          </div>
        </div>
      </div></div></div></div></div>
EOT;

    return $userDetails;
  }

  /*
  Function to get logged in user's details
  */
  function getContactDetailsForDashboard(){

    // Custom Field Name of Branch
    define('BRANCH_CUSTOM_FIELD_NAME', 'Branch');
    $contactDetails = array();

    // initialize CiviCRM
    civicrm_initialize(TRUE);
    // get logged in user's civi contact id from the session
    $session =& CRM_Core_Session::singleton();
    $contactID = $session->get('userID');

    // if contact id found, get the contact details
    if ($contactID) {

			// RS: Rebuilt ACL cache for party council members
			// as we are getting the branches via party relationships
			if (current_user_can(WP_ROLE_PARTY_COUNCIL)) {
				CRM_ACL_BAO_Cache::updateEntry($contactID);
			}

      // get branch custom field using the name
      $customFieldId = CRM_Core_DAO::getFieldValue('CRM_Core_DAO_CustomField', BRANCH_CUSTOM_FIELD_NAME, 'id', 'name');
      $branchField = 'custom_'.$customFieldId;

      // fields to return - Need to mention the fields to return in order to get cutom fields in API result
      $fields = "first_name, display_name, street_address, supplemental_address_1,supplemental_address_2, city, postal_code, country, phone, email, {$branchField}";

      $result = civicrm_api3('Contact', 'get', array(
        'sequential' => 1,
        'return' => "{$fields}",
        'id' => $contactID,
        'api.Membership.get' => array(),
      ));

      if (!$result['is_error'] && !empty($result['values'])) {
        $contactDetails = $result['values'][0];

        // get the branches :  ACL restricts the branches result with the logged in user's branches
        $branchesResult = civicrm_api3('Contact', 'get', array(
          'sequential' => 1,
          'contact_sub_type' => "Branch",
          'check_permissions' => 1,
          'options' => array('limit' => ""),
        ));

        CRM_Core_Error::debug_var('branchesResult', $branchesResult);

        $branches = array();
        if (!$branchesResult['is_error'] && !empty($branchesResult['values'])) {
          foreach ($branchesResult['values'] as $singleBranch) {
            // assign all & new members count to display as '-', if no results found
            $singleBranch['no_of_all_members'] = '-';
            $singleBranch['no_of_new_members'] = '-';

            // branch ORG's contact id
            $branchId = $singleBranch['contact_id'];

            // get no of all members of the branch
            $allMembers = civicrm_api3('BranchMembers', 'allmembers', array(
              'sequential' => 1,
              'branch_id' => $branchId,
            ));

            // assign number of all members of the branch
            if (!$allMembers['is_error']) {
              $singleBranch['no_of_all_members'] = $allMembers['count'];
            }

            // get no of new members of the branch
            $newMembers = civicrm_api3('BranchMembers', 'newmembers', array(
              'sequential' => 1,
              'branch_id' => $branchId,
            ));

            // assign number of new members of the branch
            if (!$newMembers['is_error']) {
              $singleBranch['no_of_new_members'] = $newMembers['count'];
            }

            array_push($branches, $singleBranch);
          }
        }

        $contactDetails['branches'] = $branches;
				
				// RS: Get party details for party council role
				if (current_user_can(WP_ROLE_PARTY_COUNCIL)) {
					// get the parties :  ACL restricts the parties result with the logged in user's parties
					$partiesResult = civicrm_api3('Contact', 'get', array(
						'sequential' => 1,
						'contact_sub_type' => "Party",
						'check_permissions' => 1,
						'options' => array('limit' => ""),
					));

					$parties = array();
					if (!$partiesResult['is_error'] && !empty($partiesResult['values'])) {
						foreach ($partiesResult['values'] as $singleParty) {
							// assign all & new members count to display as '-', if no results found
							$singleParty['no_of_all_members'] = '-';
							$singleParty['no_of_new_members'] = '-';
							
							// branch ORG's contact id
							$partyId = $singleParty['contact_id'];
							
							// get no of all members of the branch
							$allPartyMembers = civicrm_api3('BranchMembers', 'allpartymembers', array(
								'sequential' => 1,
								'party_id' => $partyId,
							));
							
							// assign number of all members of the branch
							if (!$allPartyMembers['is_error']) {
								$singleParty['no_of_all_members'] = $allPartyMembers['count'];
							}

							// get no of new members of the branch
							$newPartyMembers = civicrm_api3('BranchMembers', 'newpartymembers', array(
								'sequential' => 1,
								'party_id' => $partyId,
							));

							// assign number of new members of the branch
							if (!$newPartyMembers['is_error']) {
								$singleParty['no_of_new_members'] = $newPartyMembers['count'];
							}
							
							array_push($parties, $singleParty);
						}
					}
					
					$contactDetails['parties'] = $parties;
				}

      } else{
        // log
        CRM_Core_Error::debug_var('contact result empty for contact ID :', $contactID);
      }

    }

    return $contactDetails;
  }

?>