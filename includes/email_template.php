<p>
  Hello <?=value('name')?>,<br>
  Thanks for contacting STORM!
</p>

<p>
  We are thrilled that you got in touch with us and we are looking forward to discussing the next steps of your project.
</p>

<p>
  Feel free to contact us any time if you have further questions.
</p>

<h3>Details</h3>
<p>
  Name: <?=value('name')?><br>
  Company: <?=value('company')?><br>
  Address: <?=value('address')?><br>
  City: <?=value('city')?><br>
  Phone: <?=value('phone')?><br>
  Email: <?=value('email')?><br>
  Project Type: <?=value('project_type')?><br>
  Timeline: <?=value('timeline')?><br>
  Budget: <?=value('budget')?><br>
  Project: <?=value('project')?><br>
  Features:<br>
  <ul>
    <?php foreach((array)value('features') as $value): ?>
      <li><?=$value?></li>
    <?php endforeach ?>
  </ul><br>
  Integrated: <?=value('integrated')?><br>
  Pages: <?=value('pages')?><br>
  Assets:<br>
  <ul>
    <?php foreach((array)value('assets') as $value): ?>
      <li><?=$value?></li>
    <?php endforeach ?>
  </ul><br>
  Goal: <?=value('goal')?><br>
  Style: <?=value('style')?><br>
  Style URL: <?=value('style_url')?><br>
  Location: <?=value('location')?><br>
  Referral: <?=value('referral')?><br>
  Meeting: <?=value('in_person')?><br>
</p>