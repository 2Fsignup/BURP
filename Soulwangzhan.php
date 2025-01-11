<?php
namespace addons\Soulwangzhan;
use app\common\addons\Addon;

class Soulwangzhan extends Addon{
/*
 * 免费插件，请勿贩卖!
 * 百度，360，今日头条，自动推送JS代码插件
 * 香香书：www.xxs.me 
 */ 

    public $info = [
        'name'=>'Soulwangzhan',
        'title'=>'自动推送JS代码插件',
        'description'=>'自动推送JS代码插件',
        'status'=>1,
        'author'=>'xxs.me',
        'version'=>'1.0.0',
        'group'=>'home_js',
        'mold'=>'web,wap,wechat',
        'sort'=>0,
        'exclusive'=>0
    ];

    protected $addon_config;

    protected function initialize(){
        parent::initialize();
        $this->addon_config=$this->getConfig();
    }

    public function install(){
        return true;
    }

    public function uninstall(){
        return true;
    }

    public function run(){
        $html = <<<END
<!--百度自动推送-->
<script>
(function(){
    var bp = document.createElement('script');
    var curProtocol = window.location.protocol.split(':')[0];
    if (curProtocol === 'https'){
   bp.src = 'https://zz.bdstatic.com/linksubmit/push.js';
  }
  else{
  bp.src = 'http://push.zhanzhang.baidu.com/push.js';
  }
    var s = document.getElementsByTagName("script")[0];
    s.parentNode.insertBefore(bp, s);
})();
</script>
<!--360自动收录-->
<script>
(function(){
var src = "https://s.ssl.qhres2.com/ssl/{$this->addon_config['360tijiao']}.js";
document.write('<script src="' + src + '" id="sozz"><\/script>');
})();
</script>
<!--web今日头条-->
<script>
(function(){
var el = document.createElement("script");
el.src = "https://lf1-cdn-tos.bytegoofy.com/goofy/ttzz/push.js?{$this->addon_config['jinritoutiaoweb']}";
el.id = "ttzz";
var s = document.getElementsByTagName("script")[0];
s.parentNode.insertBefore(el, s);
})(window)
</script>
<!--wap今日头条-->
<script>
(function(){
var el = document.createElement("script");
el.src = "https://lf1-cdn-tos.bytegoofy.com/goofy/ttzz/push.js?{$this->addon_config['jinritoutiaowap']}";
el.id = "ttzz";
var s = document.getElementsByTagName("script")[0];
s.parentNode.insertBefore(el, s);
})(window)
</script>
END;
        return $html;
    }
}