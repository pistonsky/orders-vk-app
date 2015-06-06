<!-- BEGIN ALERT TEMPLATE -->
<script type="text/template" id="alert-template">
     <div class="alert">
          <h1><%= title %></h1>
          <% if (typeof(message) != 'undefined') { %>
          <p><%= message %></p>
          <% } %>
          <p><button id="close-alert" class="btn btn-primary">OK</button></p>
     </div>
</script>
<!-- END ALERT TEMPLATE -->
<!-- BEGIN MENU TAB TEMPLATE -->
<script type="text/template" id="tab-menu-template">
     <% _.each(menu, function(e, i, l){
          print('<div class="menu-item" data-count=0 data-id='+e.id+' style="background-image:url(' + e.picture + ')" title="' + e.description + '"><div class="counter"></div><div class="info"><span class="price">'+ e.price + '&#3647;</span><p class="title">' + e.title + '</p></div></div>');
     }) %>
     <div style="clear:both"></div>
</script>
<!-- END MENU TAB TEMPLATE -->