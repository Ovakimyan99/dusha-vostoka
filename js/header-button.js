var Menu = {
  
    el: {
      ham: $('.header-burger'),
      menuTop: $('.header-burger__top'),
      menuMiddle: $('.header-burger__middle'),
      menuBottom: $('.header-burger__bottom'),
      mobileNav: $('.mobile-nav')
    },
    
    init: function() {
      Menu.bindUIactions();
    },
    
    bindUIactions: function() {
      Menu.el.ham
          .on(
            'click',
          function(event) {
          Menu.activateMenu(event);
          event.preventDefault();
          
        }
      );
    },
    
    activateMenu: function() {
      Menu.el.menuTop.toggleClass('header-burger__top-click');
      Menu.el.menuMiddle.toggleClass('header-burger__middle-click');
      Menu.el.menuBottom.toggleClass('header-burger__bottom-click');
      Menu.el.mobileNav.toggleClass('mobile-nav--active');
    }
  };
  
  Menu.init();