<?php 
  get_header();

  $fullwidth = 12;
  if (post_have_children($post->ID)) {
  $leftcol = 6;
  $rightcol = 6;
  }
  else {
  $leftcol =8;
  $rightcol =4;
  }?>
    <?php if(have_posts()):while(have_posts()):the_post();?>
        <?php get_template_part( 'includes/page', 'banner' ); ?>
            <div class="fullwidth" id="main">
                <div class="container">
                    <div class="row">
                        <div class="col-md-<?php echo $fullwidth;?> content">
                            <!-- Print Dashboard details if user logged in -->
                            <?php
          if (is_user_logged_in()) {
            echo dashBoardDetails();
          }
        ?>
                                <?php if($post->post_excerpt) echo '<p class="lead">'.get_the_excerpt().'</p>'; ?>
                                    <?php the_content(); ?>
                        </div>
                        <?php endwhile; ?>
                            <?php endif; ?>
                                <div class="sidebar col-md-<?php echo $rightcol;?>">
                                    <?php
    if (post_have_children($post->ID)) :
    echo '<div class="row">';
    $pr = new WP_Query(array(
    'post_type'      => 'page',
    'posts_per_page' => -1,
    'post_parent'    => $post->ID,
    'order'          => 'ASC',
    'orderby'        => 'menu_order'
    ));
    while($pr->have_posts()) : $pr->the_post();
    ?>
                                        <div class="hentry media col-md-12">
                                            <?php if(has_post_thumbnail()) {
        $img = get_post_meta(get_the_ID(), 'wp_custom_attachment', true);
        echo '<a class="pull-left" href="' . $img['url'] . '">';
        the_post_thumbnail('large-square-thumb', array('class' => 'media-object', 'data-src' => "holder.js/138x138",));
        echo '</a>';
        }
      ?>
                                                <div class="media-body">
                                                    <h4 class="media-heading"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                                    <div class="media">
                                                        <?php if($post->post_excerpt) echo '<p class="excerpt">'.get_the_excerpt().'</p>'; ?>
                                                    </div>
                                                </div>
                                        </div>
                                        <?php

    endwhile;
    if (is_page('5993')):?>
                                            <div class="hentry media col-md-12"> <a class="pull-left" href="https://my.party.coop/civicrm/event/register?id=13&reset=1"><?php echo wp_get_attachment_image( '6121', 'large-square-thumb', array('class' => 'media-object', 'data-src' => "holder.js/138x138")); ?>
        </a>
                                                <div class="media-body">
                                                    <h4 class="media-heading"><a href="https://my.party.coop/civicrm/event/register?id=13&reset=1">Registration</a></h4>
                                                    <div class="media">
                                                        <p class="excerpt">Register online as a delegate or visitor</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php endif;
    echo '</div>';
    else :
    get_sidebar();
    endif;?>
                                </div>
                    </div>
                </div>
            </div>
            </div>
            <?php get_footer(); ?>
                <!-- Get logged in users Contact Details -->
                <?php

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
            All Members  <span class="badge">{$allBranchMembers}</span>
          </span>
EOT;
          $newMemberStats = <<<EOT
          <span>
            New Members  <span class="badge">{$newBranchMembers}</span>
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
          <a href="/branch-member-details?members=all{$hiddenFilter}" class="gform_button button center" type="button">
            All Branch Members  <span class="badge badge-pill badge-default">{$allBranchMembers}</span>
          </a>
EOT;
          $newMemberStats = <<<EOT
          <a href="/branch-member-details?members=new{$hiddenFilter}" class="gform_button button center" type="button">
            New Branch Members  <span class="badge badge-pill badge-default">{$newBranchMembers}</span>
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
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">{$branch['display_name']}</h3>
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
							All Members  <span class="badge badge-pill badge-default">{$allPartyMembers}</span>
						</span>
EOT;
						$newPartyMemberStats = <<<EOT
						<span>
							New Members  <span class="badge badge-pill badge-default">{$newPartyMembers}</span>
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
						<a href="/party-member-details?members=all{$hiddenFilter}" class="gform_button button center" type="button">
							All Members  <span class="badge badge-pill badge-default">{$allPartyMembers}</span>
						</a>
EOT;
						$newPartyMemberStats = <<<EOT
						<a href="/party-member-details?members=new{$hiddenFilter}" class="gform_button button center" type="button">
							New Members  <span class="badge badge-pill badge-default">{$newPartyMembers}</span>
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
            <div class="card card-default">
              <div class="card-heading">
                <h3 class="card-title"><strong>{$party['display_name']}</strong></h3>
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
        @media only screen and (min-width:960px){
          .veda-crm .list-group{
            min-height: 490px;
          }
        }

        @media only screen and (max-device-width:960px){
           .veda-crm{
              text-align: center;
           }
        }

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

        .badge-default {
          border-radius: 10px;
          font-size: 16px;
        }

        .card {
          margin: 5px 0;
          padding: 5px;
          box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05);
          width: 100%;
        }

        .card-title {
          font-size: 21px;
        }

        .card-heading {
          background-color: #f5f5f5;
          border-color: #dddddd;
          color: #333333;
          padding: 12px 18px;
        }

      </style>
      <div class="jumbotron text-white bg-primary mb-md-3">
        <div class="container">
            <div class="d-flex">
                <div class="mr-lg-5">
                    <h2 class="page-title display-3 balance-text" style="">
                            Officer dashboard</h2>
                    <p class="lead d-lg-block d-none">Welcome {$greeting}</p>                </div>
                            </div>
        </div>
    </div>
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
      </div>
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