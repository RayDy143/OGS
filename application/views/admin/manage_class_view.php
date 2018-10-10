<div class="ui container">
    <div class="ui very padded segment">
        <h2>Class CI-402PC</h2>
        <div class="ui top attached tabular menu">
          <a class="item active" data-tab="first">Manage</a>
          <a class="item" data-tab="second">Second</a>
          <a class="item" data-tab="third">Third</a>
        </div>
        <div class="ui bottom attached tab segment active" data-tab="first">
            <div class="ui list">
              <div class="item">Teacher : Mr Artemio Cabrillos</div>
              <div class="item">Subject : OPESYS</div>
              <div class="item">Section :</div>
            </div>
        </div>
        <div class="ui bottom attached tab segment" data-tab="second">
          Second
        </div>
        <div class="ui bottom attached tab segment" data-tab="third">
          Third
        </div>
    </div>
</body>
<script type="text/javascript">
$(document).ready(function() {
    $('.menu .item')
      .tab()
    ;
});
</script>
</html>
