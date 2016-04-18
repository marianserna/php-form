<form action="index.php" method="post">
  <?php if (!$sent && is_post()): ?>
    <div class="error-container">
      <h2 class="error">Oops! Something went wrong.</h2>
      <?=add_error_msg(is_valid_name(), "Please enter a valid name without numbers.")?>
      <?=add_error_msg(is_valid_phone(), "Please enter a valid phone number.")?>
      <?=add_error_msg(is_valid_email(), "Please enter a valid email.")?>
      <?=add_error_msg(is_valid_project(), "Please tell us about your project.")?>
    </div>
  <?php endif ?>

  <div class="story">
    <p>
      Once upon a time, there was a super tasteful person whose <strong>name*</strong> was
      <input type="text" name="name" value="<?=value('name')?>" placeholder="Your Name" v-model="name" class="<?=add_error_class(is_valid_name())?> required" required>
      and who was part of a great <strong>company</strong> called
      <input type="text" name="company" value="<?=value('company')?>" placeholder="Company Name">.
      One day, <span v-html="name | default '-----'"></span>, found an amazing design and development company to work on an incredible project.
    </p>
    <p>
      According to <span v-html="name | default '-----'"></span>, his/her
      <strong>address</strong> was:
      <input type="text" name="address" value="<?=value('address')?>" placeholder="Your Address">,
      <input type="text" name="city" value="<?=value('city')?>" placeholder="Your City">,
      <input type="text" name="phone" value="<?=value('phone')?>" placeholder="Your Phone" class="<?=add_error_class(is_valid_phone())?>">,
      and he/she could be reached at this <strong>email*</strong>
      <input type="email" name="email" value="<?=value('email')?>" placeholder="Your Email" class="<?=add_error_class(is_valid_email())?> required" required>.
    </p>

    <p>
      <span v-html="name | default '-----'"></span> was <strong>interested</strong> in a
      <?php
        $project_types = Array(
          '' => 'Type of project',
          'Design' => 'Design',
          'Development' => 'Development',
          'Design & Development' => 'Design & Development'
        );
      ?>
      <select name="project_type" id="project_type">
        <?php foreach ($project_types as $form_value => $display): ?>
          <option value="<?=$form_value?>" <?=selected('project_type', $form_value)?>> <?=$display?> </option>
        <?php endforeach ?>
      </select>
      project. This project had to be <strong>completed in</strong>
      <br>
      <?php
        $timelines = Array(
          '15 Days' => '15 Days',
          '1 Month' => '1 Month',
          '1 - 3 Months' => '1 - 3 Months',
          '3 - 6 Months' => '3 - 6 Months',
          'No Timeline' => 'No Timeline.'
        );
      ?>
      <?php foreach($timelines as $form_value => $display): ?>
        <label>
          <input type="radio" name="timeline" value="<?=$form_value?>" <?=radio_checked('timeline', $form_value)?>>
          <?=$display?>
        </label>
      <?php endforeach ?>
      <br>
      The project had a <strong>budget</strong> of

      <?php
        $budgets = Array(
          '' => 'Budget',
          '$2k - $5k' => '$2k - $5k',
          '$5k - $10k' => '$5k - $10k',
          '$10k - $30k' => '$10k - $30k',
          'Unlimited' => 'Unlimited'
        );
      ?>
      <select name="budget" id="budget">
        <?php foreach ($budgets as $form_value => $display): ?>
          <option value="<?=$form_value?>" <?=selected('budget', $form_value)?>> <?=$display?> </option>
        <?php endforeach ?>
      </select>
    </p>

    <p class="text-container">
      <label for="project">This cool <strong>project*</strong> consisted in</label>
      <textarea name="project" id="project" placeholder="Describe The Project" class="<?=add_error_class(is_valid_project())?> required" required><?=value('project')?></textarea>
    </p>

    <p>
      And it must had these <strong>features</strong>:
      <br>
      <?php
        $features = Array(
          'Responsive' => 'Responsive',
          'Content Management System' => 'Content Management System',
          'Translations' => 'Translations',
          'Accept Payment' => 'Accept Payments',
          'None' => 'None'
        );
      ?>
      <?php foreach($features as $form_value => $display): ?>
        <label>
          <input type="checkbox" name="features[]" value="<?=$form_value?>" <?=checked('features', $form_value)?>>
          <?=$display?>
        </label>
      <?php endforeach ?>
    </p>
    <p>
      But, should it be <strong>integrated</strong> with existing APIs?
      <br>
      <span v-html="name | default '-----'"></span> said:
      <?php
        $yesno = Array(
          'Yes' => 'Yes',
          'No' => 'No.'
        );
      ?>
      <?php foreach($yesno as $form_value => $display): ?>
        <label>
          <input type="radio" name="integrated" value="<?=$form_value?>" <?=radio_checked('integrated', $form_value)?>>
          <?=$display?>
        </label>
      <?php endforeach ?>
    </p>

    <p>
      He/She required the project to be
      <?php
        $pages = Array(
          '' => 'Pages',
          '1' => '1',
          '2' => '2',
          '3' => '3',
          '4' => '4',
          '5' => '5',
          '10' => '10',
          'More' => 'More',
        );
      ?>
      <select name="pages" id="pages">
        <?php foreach ($pages as $form_value => $display): ?>
          <option value="<?=$form_value?>" <?=selected('pages', $form_value)?>> <?=$display?> </option>
        <?php endforeach ?>
      </select>
      <strong>pages</strong>.
      Furthermore, some <strong>additional assets</strong> were needed for the project to reach its maximum potential, among them:
      <br>
      <?php
        $assets = Array(
          'Photography' => 'Photography',
          'Illustration' => 'Illustration',
          'Animation' => 'Animation',
          'Video' => 'Video.'
        );
      ?>
      <?php foreach($assets as $form_value => $display): ?>
        <label>
          <input type="checkbox" name="assets[]" value="<?=$form_value?>" <?=checked('assets', $form_value)?>>
          <?=$display?>
        </label>
      <?php endforeach ?>
    </p>

    <p class="text-container">
      <label for="goal">The main <strong>goal</strong> to be achieved with the project was</label>
      <textarea name="goal" id="goal" placeholder="Describe the Website's Goal"><?=value('goal')?></textarea>
    </p>

    <p>
      <span v-html="name | default '-----'"></span> considered the perfect <strong>style</strong> for this project
      to be:
      <br>
      <?php
        $styles = Array(
          'Vintage' => 'Vintage',
          'Material Design' => 'Material Design',
          'Heavily Animated' => 'Heavily Animated',
          'Minimal' => 'Minimal',
          'Undecided' => 'Undecided.'
        );
      ?>
      <?php foreach($styles as $form_value => $display): ?>
        <label>
          <input type="radio" name="style" value="<?=$form_value?>" <?=radio_checked('style', $form_value)?>>
          <?=$display?>
        </label>
      <?php endforeach ?>
      <br>
      An <strong>example</strong> of this style would be
      <input type="url" name="style_url" value="<?=value('style_url')?>" placeholder="Insert Website URL">.
    </p>

    <p>
      The <strong>closest location</strong> to <span v-html="name | default '-----'"></span> is:
      <br>
      <?php
        $locations = Array(
          '' => 'Location',
          'Toronto' => 'Toronto',
          'Medellin' => 'Medellin',
          'Mexico' => 'Mexico DF'
        );
      ?>
      <?php foreach($locations as $form_value => $display): ?>
        <label>
          <input type="radio" name="location" value="<?=$form_value?>" <?=radio_checked('location', $form_value)?>>
          <?=$display?>
        </label>
      <?php endforeach ?>
    </p>

    <p>
      <span v-html="name | default '-----'"></span> <strong>found</strong> <strong>STORM</strong> Creative Development Agency through
      <?php
        $referrals = Array(
          '' => '',
          'Internet' => 'Internet',
          'TV' => 'TV',
          'Referral' => 'Referral',
          'Magazine' => 'Magazine'
        );
      ?>
      <select name="referral" id="referral">
        <?php foreach ($referrals as $form_value => $display): ?>
          <option value="<?=$form_value?>" <?=selected('referral', $form_value)?>> <?=$display?> </option>
        <?php endforeach ?>
      </select>
    </p>

    <p>
      <span v-html="name | default '-----'"></span> would be interested in meeting <strong>in person</strong>
      <?php
        $yesno = Array(
          'Yes' => 'Yes',
          'No' => 'No.'
        );
      ?>
      <?php foreach($yesno as $form_value => $display): ?>
        <label>
          <input type="radio" name="in_person" value="<?=$form_value?>" <?=radio_checked('in_person', $form_value)?>>
          <?=$display?>
        </label>
      <?php endforeach ?>
    </p>

    <p>
      <label>
        <input type="checkbox" name="receive_copy" id="receive_copy" value="Yes" <?=value('receive_copy') == 'Yes' ? 'checked' : ''?>>
        Would <span v-html="name | default '-----'"></span> like to receive a <strong>confirmation</strong> email?
      </label>
    </p>

    <img id="send" src="images/send.png">

    <h3>No time for this form? Give us a call at 647-123-1234.</h3>
  </div>
</form>
