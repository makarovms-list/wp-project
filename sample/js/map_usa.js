window.onload=function(){
    var windowWidth = jQuery('#map').width();
    var windowHeight = windowWidth * 2/3;
    var current = null;
    jQuery(".other_world").click(function() {
        var cls;
        if (current) {
            cls = current.region + "-map";
            jQuery("." + cls).hide();
            current.attr({
                opacity: '1'
            });
            current.isCurrent = false;
        }
        current = null;
        jQuery(".other-map").show();
        return false;
    })
    jQuery(".view_all").click(function() {
        var cls;
        if (current) {
            //cls = current.region + "-map";
            //jQuery("." + cls).hide();
            current.attr({
                opacity: '1'
            });
            current.isCurrent = false;
        }
        current = null;
        jQuery(".hidden-map").show();
        return false;
    })
    var mouseover = function() {
        this.animate({
            opacity: '0.7'
        }, 200);
    };
    var mouseout = function() {
        if (!this.isCurrent) {
            this.animate({
                opacity: '1'
            }, 200);
        }
    };
    var click = function() {
        var cls = this.region + "-map";
        jQuery(".hidden-map").hide();
        if (current) {
            cls = current.region + "-map";
            jQuery("." + cls).hide();
            current.attr({
                opacity: '1'
            });
            current.isCurrent = false;
        } else {
            jQuery(".other-map").hide();
        }
        current = this;
        current.isCurrent = true;
        cls = current.region + "-map";
        this.attr({
            opacity: '0.7'
        });
        jQuery("." + cls).show();
    };
    function draw(windowWidth, windowHeight) {
        var rsr = Raphael('map', windowWidth,windowHeight);
        rsr.setViewBox(0, 0, 650, 425.7, true);
        var Dividing_Lines = rsr.set();
        Dividing_Lines.attr({'id': 'Dividing_Lines','name': 'Dividing_Lines'});
        var group_a = rsr.set();
        var path_g = rsr.path("M 311.4,55.2 311.4,54.1 291.7,54.9 274.1,54.9 232,55 231.5,68.4 231.7,98.2 290.3,98.2 293.2,100.1     296.7,101.2 297.5,100.6 300.3,100.6 304.4,100.5 307.4,102.5 310.6,103.8 311.1,105.1 311.7,105.5 312.4,105.6 312.4,105.5     310.6,103.8 311.6,100.9 312.1,98.6 312.3,97.3 311,95.4 311,90.8 312.5,90.8 312.6,77.6 311.3,63.4 309.6,62.3 308.3,59.5     309,56.8    z").attr({class: 'st0',parent: 'Dividing_Lines','stroke-width': '0','stroke-opacity': '1','fill': '#000000'}).data('id', 'path_g');
        var path_h = rsr.path("M 232,53.5 274.1,53.4 291.7,53.4 311.5,52.6 311.5,50.6 310.9,48.4 310,45.8 309.4,42.5 309.3,39     308.9,38.1 308.5,33.3 308.4,31.2 308.2,29.4 307.7,26.2 306.4,23 305.1,19.9 304.9,16.8 304.8,13.5 305.2,11.4 305.2,9.8     304.2,7.4 304.1,6.4 268,6.4 231.3,6.3 231.5,35.2    z").attr({class: 'st0',parent: 'Dividing_Lines','stroke-width': '0','stroke-opacity': '1','fill': '#000000'}).data('id', 'path_h');
        var path_i = rsr.path("M 324.2,141.4 323.4,139.6 321.8,137.8 319.8,135.5 319.6,134.2 318.8,131.4 319.1,128.8 318.9,126.5     317.8,122.5 317.2,121 316.3,120.5 316.2,116.8 315.6,114.6 313.6,111.8 313.6,110.5 312.9,108.2 312.6,107.2 311.1,107     309.8,106.1 309.4,105 306.6,103.8 304,102 300.3,102.2 298,102.1 297,102.9 292.5,101.6 289.8,99.8 231.7,99.8 231.8,127.2     253.4,127.2 253.4,141.4    z").attr({class: 'st0',parent: 'Dividing_Lines','stroke-width': '0','stroke-opacity': '1','fill': '#000000'}).data('id', 'path_i');
        var path_j = rsr.path("M 392,184.4 390.6,183 389.3,183.4 387.5,179.2 387.9,177.1 387.3,174.4 386.4,174.1 383.6,171.2     382.5,171.1 380.1,168.9 378.2,166.5 379.1,163.7 380,161.7 380.6,159.6 379.2,158.1 377.3,158.9 375.3,158 375.1,155.3     374.3,153 373.5,152.5 371,150.6 368.8,148.1 366.9,145 365.9,140.5 366.7,137.3 365.6,136.4 363.7,134.3 352.2,134.6     339.8,134.7 330.1,134.7 321.3,134.7 321.3,134.8 323,136.8 324.7,138.7 326.1,141.7 328.3,143.3 330.1,143.2 330.6,146.2     329.1,148.7 329.7,149.6 331,152.3 334,153.7 333.9,169 333.8,182.8 333.9,182.8 333.8,189 346.2,189.2 358.1,189.2 369.6,189.2     382.4,190 383.7,192.6 381,195.8 380.9,195.9 386.1,195.9 386.9,193.1 387.5,191.3 387.8,189.7 390.5,188.1 391.9,187.3     391.7,185.5    z").attr({class: 'st0',parent: 'Dividing_Lines','stroke-width': '0','stroke-opacity': '1','fill': '#000000'}).data('id', 'path_j');
        var path_k = rsr.path("M 306.8,9.5 306.7,11.6 306.4,13.6 306.5,16.7 306.7,19.6 307.9,22.4 309.2,25.8 309.8,29.1 310,31.1     310,33.2 310.5,37.7 310.8,38.6 311,42.3 311.5,45.4 312.4,47.9 313.1,50.4 313.1,53.4 312.8,56 310.4,57.8 309.9,59.3     310.8,61.2 312.8,62.5 314.2,77.6 314,90.8 325.1,90.8 339.8,90.6 355.6,90.5 368.9,90.8 368.7,90 368.7,86.4 368.5,85.6     365,83.4 362.1,80.7 361.4,79.1 360.3,78.2 357,76.2 355.6,76.1 352,72.7 352.4,69 352.4,64.8 353.1,61.2 350.8,58.2 352.7,54.8     355.1,53.2 357.8,51.5 357.7,42.8 360.5,41.9 360.6,39.8 368.2,32.9 376,26.4 385.3,21.9 374.1,18.4 365.3,20.5 354.6,15.4     343.6,12.8 335.9,11.8 332.1,8.7 330.3,0 328.1,0.1 328,6.4 305.7,6.4 305.7,7.1    z").attr({class: 'st0',parent: 'Dividing_Lines','stroke-width': '0','stroke-opacity': '1','fill': '#000000'}).data('id', 'path_k');
        var path_l = rsr.path("M 328.4,150.4 327.3,148.7 328.9,145.9 328.8,144.8 327.8,144.9 325.2,143 253.4,143 253.5,163.7     253.5,182.9 262.9,182.9 273.7,182.9 284.6,182.8 304.1,182.8 323.5,182.8 332.3,182.8 332.4,169 332.5,154.7 329.8,153.5    z").attr({class: 'st0',parent: 'Dividing_Lines','stroke-width': '0','stroke-opacity': '1','fill': '#000000'}).data('id', 'path_l');
        var path_m = rsr.path("M 375.4,120.4 377.6,119.7 378.2,118.9 380.1,115.7 380.6,112.4 379.8,111.5 377.9,110.2 377.4,108.6     376.2,107.9 375.5,106.6 374.5,104.6 370.9,103.2 370.1,100.5 369.6,99.1 369.6,95.6 370.4,94.7 369.2,92.7 369.2,92.3     355.6,92.1 339.8,92.2 325.1,92.4 313.2,92.3 312.6,92.3 312.5,94.9 314,97 313.7,98.9 313.1,101.3 312.4,103.3 314,104.8     314,106.4 314.4,107.7 315.2,110.3 315.1,111.3 317,114 317.8,116.6 317.9,119.6 318.5,120 319.3,122 320.5,126.2 320.7,128.8     320.4,131.3 320.9,133.2 330.1,133.2 339.8,133.2 352.2,133.1 364.4,132.7 366.7,135.3 367,135.5 367.1,134 369.9,131.8     370.6,129.8 371.9,127.5 371.6,125.9 370,124.6 371.3,121.2    z").attr({class: 'st0',parent: 'Dividing_Lines','stroke-width': '0','stroke-opacity': '1','fill': '#000000'}).data('id', 'path_m');
        var path_n = rsr.path("M 220.2,127.2 230.3,127.2 230.2,99 229.9,69.1 212.6,69 193.1,69.1 176.3,68.9 155.7,69 155.8,76.1     155.7,76.2 156,76.4 156,113.6 155.9,126.9 176.8,127.2 198.5,127.2    z").attr({class: 'st0',parent: 'Dividing_Lines','stroke-width': '0','stroke-opacity': '1','fill': '#000000'}).data('id', 'path_n');
        var path_o = rsr.path("M 176.3,67.3 193.1,67.5 212.6,67.4 229.9,67.6 230.4,54.3 229.9,35.2 229.7,6.3 198.1,6.4 133.4,6.4     101.9,6.4 102.7,22.5 105.6,26.8 105.6,29.6 107.3,31.8 109.8,33.4 111.8,36 114.7,40.8 117.2,42.8 121.3,43 119.7,47.4     118.7,51.3 119.7,55.6 118.4,56.7 118.5,59.9 119.6,60.8 121.1,59.5 122.5,56.9 124.7,57.5 126.2,60 127.4,64.8 129.4,66.7     130.1,70.8 130.5,71.5 132.7,71.9 134.2,74.4 135.6,77.4 137.1,75.8 140.3,76.3 140.6,74.8 147.4,75.8 149.3,75.4 151,72.2     153.1,72.9 154.2,75.1 154.2,67.5    z").attr({class: 'st0',parent: 'Dividing_Lines','stroke-width': '0','stroke-opacity': '1','fill': '#000000'}).data('id', 'path_o');
        var path_p = rsr.path("M 251.9,128.7 220.2,128.7 198.5,128.8 177.6,128.8 177.7,182.8 193.8,182.8 211,182.8 229.3,182.8     242.3,182.8 252,182.9 252,163.7 251.9,142.2    z").attr({class: 'st0',parent: 'Dividing_Lines','stroke-width': '0','stroke-opacity': '1','fill': '#000000'}).data('id', 'path_p');
        group_a.attr({'parent': 'Dividing_Lines','name': 'group_a'});
        group_a.region = "st0";
        var group_b = rsr.set();
        var path_q = rsr.path("M 144.4,124.4 113.7,124.5 113.7,192.9 130.4,192.6 151.2,192.7 166.1,192.8 166,138.8 144.4,138.4        z").attr({class: 'st1',parent: 'Dividing_Lines','stroke-width': '0','stroke-opacity': '1','fill': '#000000'}).data('id', 'path_q');
        var path_r = rsr.path("M 81.6,58.3 82.6,60.7 82.5,63.3 84.8,66 86.7,67.4 87.5,70.3 86.2,72.5 84.8,76.4 83.2,81.4     80.9,84.5 79.5,87.7 79.4,89.4 81.3,90.4 82.4,92.8 81.4,97.2 81.2,122.8 112.9,122.9 144.4,122.8 144.4,87.2 143,86.2 142,84.2     141.8,84.1 140.4,86.8 137.4,87.4 131.9,86.5 131.6,88 127.7,87.4 125.2,90 122.8,85.2 121.7,83.3 119.5,82.9 118.6,81.4     117.9,77.5 116,75.6 114.8,70.6 113.7,68.9 113.2,68.7 112.4,70.4 109.6,72.8 106.9,70.6 106.8,65.9 108,65 107.1,61.3 108.2,57     109.1,54.4 106.6,54.3 103.5,51.8 100.5,46.9 98.8,44.5 96.3,43 94,40.2 94,37.2 91.2,33 90.3,16.4 81.2,16.4 81.3,36.4    z").attr({class: 'st1',parent: 'Dividing_Lines','stroke-width': '0','stroke-opacity': '1','fill': '#000000'}).data('id', 'path_r');
        var path_s = rsr.path("M 108.4,204.7 110.6,205.6 111.3,205.9 111.9,204.4 112.2,204.1 112.1,193.6 112.1,124.5 81.2,124.4     81.2,124.4 49.1,124.5 49.1,165.9 69.2,184.3 88.6,202.1 105.9,218 106.2,216.9 105.7,214.4 105.4,211.8 105.4,209.1 104.4,207.1     105.5,204.7    z").attr({class: 'st1',parent: 'Dividing_Lines','stroke-width': '0','stroke-opacity': '1','fill': '#000000'}).data('id', 'path_s');
        var path_t = rsr.path("M 106,250.6 105.5,251.8 121,257.8 145.6,266.6 166.1,266.6 166.1,194.3 151.2,194.2 130.4,194.2     113.7,194.4 113.8,204.8 113.2,205.3 112.3,207.9 110,207.1 108.1,206.2 106.5,206.2 106.1,207.1 107,208.7 107,211.7     107.2,214.2 107.7,216.9 107.1,219.5 107.3,220.5 107.8,222.2 108.7,224.4 110,226.8 112.6,229.8 108.9,232.8 108.1,238.6     106,241.5 106.5,243.4 106.9,245.1 109,247.1 107.4,250.6    z").attr({class: 'st1',parent: 'Dividing_Lines','stroke-width': '0','stroke-opacity': '1','fill': '#000000'}).data('id', 'path_t');
        var path_u = rsr.path("M 5.8,58.6 7.4,58.4 10.9,58.5 13.6,60 17,60.9 19.2,64.3 19.5,67 20.2,68.7 22.2,69.1 24.6,69.1     28.7,67.5 31.4,66.9 35.5,67.6 37,68.4 39,67.9 41.5,66.6 46.4,66.8 50.2,65.2 52.6,63.8 55.4,64.5 59.2,62.9 80.9,62.8 81,61     80,58.6 79.7,36.4 79.7,16.4 48.3,16.4 17.2,16.3 22,28.8 23.8,42.4 20.1,48.1 14.9,34.6 1.3,31.9 3,46.2    z").attr({class: 'st1',parent: 'Dividing_Lines','stroke-width': '0','stroke-opacity': '1','fill': '#000000'}).data('id', 'path_u');
        var path_v = rsr.path("M 48.3,123 79.7,122.9 79.8,97.1 80.8,93 80.1,91.5 77.9,90.4 77.9,87.3 79.5,83.7 81.8,80.7     83.4,75.9 84.8,71.9 85.8,70.1 85.4,68.3 83.7,67.2 81.3,64.4 59.5,64.5 55.5,66.1 52.8,65.5 50.9,66.6 46.7,68.4 41.9,68.2     39.5,69.4 36.9,70 35,69.1 31.4,68.5 29.1,69 24.9,70.6 22,70.7 19,70 18,67.3 17.7,64.8 16,62.2 13,61.4 10.5,60.1 7.4,60     5.9,60.1 4,82.7 3.2,99.7 0,115.4 3.2,122.9    z").attr({class: 'st1',parent: 'Dividing_Lines','stroke-width': '0','stroke-opacity': '1','fill': '#000000'}).data('id', 'path_v');
        var path_w = rsr.path("M 224.7,367.1 222.7,363.3 220.6,364.8 219,364.9 220.9,368.3 222.5,368.3 222.8,368.2 224.2,367.8     225.9,369.1 227.4,368.7 226.6,367.3    z").attr({class: 'st1',parent: 'Dividing_Lines','stroke-width': '0','stroke-opacity': '1','fill': '#000000'}).data('id', 'path_w');
        var path_x = rsr.path("M 197.3,358.1 198.9,356.8 199.4,354 199,353.5 195.8,353.5 193.6,354.7 193,355.8 195.4,357.7    z").attr({class: 'st1',parent: 'Dividing_Lines','stroke-width': '0','stroke-opacity': '1','fill': '#000000'}).data('id', 'path_x');
        var path_y = rsr.path("M 248,377.1 245.9,375 245.4,375 245.1,375.6 246.1,377.2 248.5,377.6 249.6,381 253.9,380.4     255,379.5 255,378.9 251.2,376.4    z").attr({class: 'st1',parent: 'Dividing_Lines','stroke-width': '0','stroke-opacity': '1','fill': '#000000'}).data('id', 'path_y');
        var path_z = rsr.path("M 273.2,399.6 272.7,398.2 271.2,397.9 270.8,395.3 269.2,393.5 258.9,388.7 258.9,388.7 258.7,389.7     260,392.6 256.2,397.4 258.7,403.6 258.9,408.8 262.1,410.3 263.4,408.1 267.5,405.2 271.8,404.1 275.2,401.2    z").attr({class: 'st1',parent: 'Dividing_Lines','stroke-width': '0','stroke-opacity': '1','fill': '#000000'}).data('id', 'path_z');
        var path_aa = rsr.path("M 235.4,372.1 241.4,373 242.1,372.5 235.6,371.6    z").attr({class: 'st1',parent: 'Dividing_Lines','stroke-width': '0','stroke-opacity': '1','fill': '#000000'}).data('id', 'path_aa');
        var path_ab = rsr.path("M 53.2,227.7 57.9,231.8 62.2,232.3 74,240.2 78.8,247.1 80,251.3 91.6,250.4 105.4,249.1 106.4,249.1     107.1,247.5 105.4,245.9 105,243.8 104.4,241.2 106.6,238 107.5,232 110.4,229.6 108.8,227.7 107.3,225.1 106.4,222.7     105.7,220.9 105.6,219.9 87.6,203.2 68.2,185.4 47.5,166.6 47.5,124.5 3.5,124.4 3.8,136.1 1.5,147.6 7.2,155.2 8.7,166.6     16.9,177.9 21.9,182.6 21.5,185.9 30.4,204.4 41,217.8 42.3,224.9 44.6,226.7    z").attr({class: 'st1',parent: 'Dividing_Lines','stroke-width': '0','stroke-opacity': '1','fill': '#000000'}).data('id', 'path_ab');
        var path_ac = rsr.path("M 196.5,411.1 192.1,402.1 189.6,396.5 185.8,392.9 182.8,389.4 180.9,385.8 177.5,388 172.8,393.3     168.5,387.1 165.7,383.5 161.9,381.4 157.1,381.1 157.1,285.8 153,284.3 146.8,280.7 141.2,282.7 137.8,281 129.7,279.8     121,275.9 116.7,277.1 109.4,274.7 109.7,271.9 103.8,271.2 101.4,274.4 97.9,267.8 92.2,265.3 85.7,272.1 81.7,271.3 74.1,276.7     70.1,278.1 66,283.6 65,289.6 59.3,295.4 52,295.7 50.1,300.8 55.4,304.1 59.6,309 62.6,314.4 67.7,318.5 71.9,326.3 60.8,326.8     61.4,321.6 59,321.6 49.8,326.6 44.6,330.4 49.4,335.7 51.1,339.6 56.7,341.7 62.7,340.6 65.7,342.5 66.7,340.8 71.6,338.5     76.1,338.3 72.3,342.8 74.2,344.2 75.3,349.4 71.4,353 68.4,352.2 64.9,356.8 61.6,355.2 58.9,355.7 57.5,360 54.1,365.1     52.6,369.7 55.8,373.4 55.8,378.2 58.4,380.1 61.7,383.8 67.2,382.2 70.6,385.8 69.7,389.1 70,393.2 71.6,393.2 76.4,389.4     77.7,392.6 78.6,390.1 81.6,394.6 83.8,391.9 85.3,393.4 91.7,390.2 88.7,396.9 87.9,403.1 84.7,406 83.7,407.5 77.9,412.1     75.7,415.4 70.4,416.3 66,420.3 61.8,422.6 57.8,425.6 57.8,425.7 64.3,423.8 67.7,421.4 72.1,418.9 76.3,416.7 79.2,417.3     83.6,414.4 85,410.8 91.5,406.9 92.6,403.4 97,400.9 101.4,397.7 105.1,392.3 101.9,388.2 108.4,381.9 111.3,376.2 117.5,370.6     119.5,374.3 114.6,377.2 112.9,385 113.3,388.8 117,387.5 120.7,384.7 125.7,382.9 127.4,382.5 126.6,376.7 132.2,374.5     137.5,378.4 145.6,382.1 151.4,381.4 159,384.5 163.2,386.1 171.8,394.7 176.6,396.9 183.2,397 187.8,397.6 190.1,405.4     195.6,411.6 196.8,418.1 200.3,420.3 202,422.4 203.7,419.9 203.6,415.8    z").attr({class: 'st1',parent: 'Dividing_Lines','stroke-width': '0','stroke-opacity': '1','fill': '#000000'}).data('id', 'path_ac');
        var path_ad = rsr.path("M 106.4,400.4 104.4,401.4 101,403.9 101.5,406.8 103,408.2 106.7,405.6 109.8,402.5 108.6,400.8    z").attr({class: 'st1',parent: 'Dividing_Lines','stroke-width': '0','stroke-opacity': '1','fill': '#000000'}).data('id', 'path_ad');
        var path_ae = rsr.path("M 33.1,350.7 30.5,351.7 28.7,350.4 28.6,352.2 29,352.6 32.8,352 34.6,354 37.3,355.7 39.9,354.1     36.3,353.1    z").attr({class: 'st1',parent: 'Dividing_Lines','stroke-width': '0','stroke-opacity': '1','fill': '#000000'}).data('id', 'path_ae');
        var path_af = rsr.path("M 50.3,380.5 47.6,381.4 49.2,382.8 51.5,384.1 53.2,383.2 52.9,381.1    z").attr({class: 'st1',parent: 'Dividing_Lines','stroke-width': '0','stroke-opacity': '1','fill': '#000000'}).data('id', 'path_af');
        group_b.attr({'parent': 'Dividing_Lines','name': 'group_b'});
        group_b.region = "st1";
        var group_c = rsr.set();
        var path_ag = rsr.path("M 380.3,86.2 380.3,89.8 380.5,91.4 380.7,92.1 382.3,94.8 381.2,96.1 381.2,98.8 381.6,100.1     382.2,102 385.7,103.4 386.7,105.5 397.2,105.5 408.5,105.5 416.1,105.6 416.1,105.6 416.2,105.6 416.4,102.8 415,95.6 417.1,87     419.6,76.4 424.7,65.8 424.7,65.8 416.3,76.1 413.9,73.1 418.1,67.6 416.6,65.7 417.2,63.8 415,63.6 415.7,60.1 416.2,59.1     415.5,57.6 412.9,56.6 412.3,54.2 410.8,54 407.6,54 401.3,51.2 391.4,48.3 390.6,45.4 389.5,45.1 388.7,45.5 388.3,45.2 382,40     369.2,43.9 369.4,52.9 368.4,52.9 366,54.5 363.8,55.8 362.6,58.1 364.8,60.8 363.9,65 363.9,69.1 363.6,72.1 366.3,74.6     367.5,74.7 371.2,77 372.6,78.1 373.4,79.8 375.9,82.2 379.8,84.5    z").attr({class: 'st2',parent: 'Dividing_Lines','stroke-width': '0','stroke-opacity': '1','fill': '#000000'}).data('id', 'path_ag');
        var path_ah = rsr.path("M 495,115 490.5,116.6 484.1,120.6 476,122.6 470.3,121.8 463.7,118.8 459.8,118.9 454.9,118.9     450.1,119.1 450.1,131.3 450,145 449.9,154 453.1,154.3 455.3,155.8 458.1,158.8 460.3,159.8 461.8,160.8 464.3,160.4     466.1,161.2 468.2,160.5 470.9,160.2 471.9,162.4 473.5,163.4 475.6,163.2 476.7,161.7 476.8,158.7 478.7,155 481.3,155.6     481.7,153 484.6,150.2 486.2,150.5 487.4,150.2 488.4,149.6 491.1,146.7 491.3,145.4 492.3,142.4 493.5,138.7 493.9,135.7     493.3,133.4 495,132.7    z").attr({class: 'st2',parent: 'Dividing_Lines','stroke-width': '0','stroke-opacity': '1','fill': '#000000'}).data('id', 'path_ah');
        var path_ai = rsr.path("M 448.6,57.8 447.2,63.2 444.8,64.8 442.9,72 441.4,72 440.7,68.1 437.5,70.8 434.9,75.8 432.1,83     431.6,89.1 435.2,98.3 434.8,108.3 430.2,115.7 429.4,116.4 450,116.4 450,117.6 454.8,117.5 459.7,117.5 463.4,117.4     466.8,112.1 469.2,107 474.2,99.1 473.8,93.3 471.9,85.2 468.8,84 462.2,90.4 459,90.3 458.3,85.5 464.4,79.4 465.3,72.8     464.5,66.3 456.8,60.6    z").attr({class: 'st2',parent: 'Dividing_Lines','stroke-width': '0','stroke-opacity': '1','fill': '#000000'}).data('id', 'path_ai');
        var path_aj = rsr.path("M 392.6,47.1 401.7,49.8 407.9,52.5 410.8,52.5 413.5,52.8 414.2,55.4 416.7,56.4 417.8,59.2     417.1,60.7 416.8,62.3 419.3,62.4 418.4,65.4 419,66.2 425.1,56.9 432.7,55.5 441.3,52.3 450,54.1 450.2,54.1 458.3,52.9     453.4,47.2 454.2,46.2 452.7,46 452,47.7 447.7,46.9 445.5,42.6 435.5,43.9 425.5,47.5 417.7,41.3 410.8,39.1 413.7,32     406.2,36.2 397.5,41.4 391.6,44.2 391.8,44.3    z").attr({class: 'st2',parent: 'Dividing_Lines','stroke-width': '0','stroke-opacity': '1','fill': '#000000'}).data('id', 'path_aj');
        var path_ak = rsr.path("M 419.8,161.1 419,163.3 416.7,166.4 415.3,169.9 415.3,170.3 418.4,171.5 420.8,169.9 423.9,171.8     424.4,171 427.5,169.4 429.6,170.8 430.4,169.9 433.1,166 434.2,168.8 435.5,169.4 437.6,165.7 439.2,165.3 440.5,163.1     441.9,162.2 442.2,159 445.2,159.6 446.9,158.5 448.4,158.4 448.6,158.1 447.6,155.2 448.4,154.4 448.4,145 448.5,131.3     448.5,117.9 439.1,118 427.7,117.9 424.8,119.5 420.7,119.6 420.7,134.4 420.6,150.8 419.5,154.4 420.2,155.3 420.9,157.9     420.8,160.2    z").attr({class: 'st2',parent: 'Dividing_Lines','stroke-width': '0','stroke-opacity': '1','fill': '#000000'}).data('id', 'path_ak');
        var path_al = rsr.path("M 402.7,179.9 406.3,180.8 408.5,181.9 409.2,181.4 408.8,178.3 411.7,176.9 412.8,176.3 412.1,175.4     413.5,173.2 413.4,172.4 413.8,169.5 415.4,165.6 417.6,162.6 418.4,160.3 419.2,159.5 419.3,158.1 418.8,156 417.7,154.8     419.1,150.6 419.1,134.4 419.1,118 416.2,110.4 416.1,107.2 408.5,107.1 397.2,107 387.7,107 388.7,107.6 389.2,109.2     390.8,110.3 392.2,111.9 391.6,116.3 389.5,119.7 388.6,121 385.8,121.9 382.5,122.6 381.9,124.1 383,125 383.6,127.8 382,130.5     381.3,132.8 378.6,134.8 378.4,137.1 377.5,140.5 378.4,144.4 380.1,147.1 382,149.4 384.4,151.2 385.6,152 386.7,155 386.8,157     387.3,157.2 389.6,156.2 392.3,159.2 391.5,162.2 390.5,164.2 389.9,166.2 391.2,167.9 393.1,169.6 394.3,169.6 397.3,172.7     398.6,173.2 399.5,177.1 399.1,179 400.2,181.5 401.1,181.2 401.7,181.8    z").attr({class: 'st2',parent: 'Dividing_Lines','stroke-width': '0','stroke-opacity': '1','fill': '#000000'}).data('id', 'path_al');
        var path_am = rsr.path("M 476.2,174.9 474.5,173 474,170.9 472.6,168.6 472.8,165.6 472.6,164.7 470.7,163.5 470,161.8     468.6,162 466.1,162.8 464.1,162 461.4,162.4 459.6,161.2 457.2,160.1 454.2,157 452.6,155.8 449.4,155.5 449.4,155.6     450.2,158.2 449.4,160 447.4,160 445.6,161.3 443.6,160.9 443.4,163.1 441.7,164.2 440.2,166.7 438.6,167.1 436.1,171.5     433,169.9 432.7,169.3 431.6,170.8 430,172.9 427.4,171.2 425.5,172.2 424.4,174 420.8,171.8 418.6,173.2 416.4,172.4     416.3,173.8 415,173.5 415.1,173.6 414,175.3 415.1,176.9 412.4,178.3 410.5,179.2 410.9,182.1 408.7,183.7 405.7,182.3     403.5,181.7 403.2,182.3 403.6,184.2 403.3,185.6 403.5,188.1 401.4,189.4 413.2,189.5 413.2,187.4 416.5,187.4 416.9,188     423.2,187.6 429.1,187.7 435.4,187.8 441.6,188.2 444.7,188 454.3,188.6 461.5,188.2 464.5,187.4 466.5,186.7 467.4,185.4     470.4,183.8 471.3,182.7 471.6,181.4 475.2,179.7 478.3,176.9 477.4,176.8    z").attr({class: 'st2',parent: 'Dividing_Lines','stroke-width': '0','stroke-opacity': '1','fill': '#000000'}).data('id', 'path_am');
        group_c.attr({'parent': 'Dividing_Lines','name': 'group_c'});
        group_c.region = "st2";
        var group_d = rsr.set();
        var path_an = rsr.path("M 342.6,282.5 342.6,280.7 341.7,279.8 342.9,276.3 343.5,274.9 344.5,270.7 343.6,269.2 342.4,266.3     341.4,263.3 340.9,261.6 339,260.1 338.4,246 338.9,239.5 337.3,239.5 334.8,239.7 334.1,238.6 329.6,236.2 326.9,234.9     324.6,235.7 320.6,235.6 318.6,235.6 316.8,236.6 314.7,237.3 313.1,236.6 309.2,237.4 307.8,235.6 306.4,237.1 302.9,236.1     300.1,234.2 296.5,235.7 295,232.3 290.4,232.6 287.1,231.9 283.1,230.9 281.7,228.4 279.1,229.2 277,228 274,226.4 274,201.1     243.1,201.1 243.1,259.8 203.9,259.8 203.9,259.8 205,261.6 208.8,266 214.4,270 220.9,275.6 224.6,282.3 227.2,288.9     232.5,292.5 240.9,295.9 247.6,286.3 257,286.1 265,291.2 270.6,299.9 274.3,307 280.7,314 283.1,322.5 286,327.9 294.1,331.5     301.7,334.1 304.6,333.8 303,330.6 302.4,324.7 302.5,316.1 305.1,310.4 311.2,304.4 322,299.1 331.9,289.9 340.4,287.5     339.8,286.3 341.2,284    z").attr({class: 'st3',parent: 'Dividing_Lines','stroke-width': '0','stroke-opacity': '1','fill': '#000000'}).data('id', 'path_an');
        var path_ao = rsr.path("M 275.6,199.5 275.6,225.4 277.8,226.6 279.3,227.5 282.4,226.6 284.1,229.5 287.4,230.4 290.5,231.1     296,230.7 297.3,233.7 300.3,232.5 303.6,234.7 305.9,235.3 307.9,233.1 309.8,235.6 313.2,235 314.7,235.6 316.2,235.2     318.2,234.1 320.7,234.1 324.3,234.2 326.9,233.2 330.3,234.8 333.9,236.7 334.1,226.6 334.4,213.9 332.2,199.8 332.3,194.3     323.5,194.3 304.1,194.4 284.6,194.4 273.7,194.4 262.9,194.4 252.7,194.4 243.1,194.4 243.1,199.5    z").attr({class: 'st3',parent: 'Dividing_Lines','stroke-width': '0','stroke-opacity': '1','fill': '#000000'}).data('id', 'path_ao');
        var path_ap = rsr.path("M 202.2,258.2 241.6,258.2 241.6,200.3 241.5,194.4 229.3,194.4 210.9,194.4 193.8,194.3 177.7,194.3     177.7,266.6 184.8,266.5 185,261.3 203,261.3 202.4,260.3    z").attr({class: 'st3',parent: 'Dividing_Lines','stroke-width': '0','stroke-opacity': '1','fill': '#000000'}).data('id', 'path_ap');
        var path_aq = rsr.path("M 385.3,287.2 386.6,281.9 386.4,280.8 386.1,279 384.7,277.6 383.8,275.6 384.6,273.4 384.8,272.2     375.5,272.2 365.3,271.8 364.7,267.6 366.1,266.1 367.1,263.2 368.1,260.3 370.2,258.4 370.7,256 371.9,254.9 370.7,253     371.1,251.4 369.5,248.7 370.4,247 370.3,246.8 361.5,246.4 349.6,246.8 340,246.8 340.6,259.3 342.2,260.7 342.9,262.9     343.8,265.8 345,268.5 346.1,270.5 345,275.5 344.3,276.9 343.5,279.3 344.2,280.1 344.2,283.2 342.4,285 341.6,286.4 342,287.2     351,287.6 359.4,289.2 365.7,291.8 374.7,294.2 388.3,293.8    z").attr({class: 'st3',parent: 'Dividing_Lines','stroke-width': '0','stroke-opacity': '1','fill': '#000000'}).data('id', 'path_aq');
        var path_ar = rsr.path("M 335.7,226.6 335.4,237.8 335.5,238 337.2,237.9 340.6,238 340,245.3 349.6,245.3 361.5,244.9     370,245.3 370.3,243.6 369.1,240.3 369.3,236.9 371.7,232.3 373,229.4 375.1,227.5 376.2,226.8 377.4,223.7 377.5,221.5     379.5,220.5 379.7,219.5 380.8,218.4 380.7,214.6 382.5,212.7 382.9,210.5 385,209.1 385.9,207.5 385.9,207.4 378.4,207.4     379.7,204.9 381.8,202.4 381.4,201.5 369.5,200.8 358.1,200.7 346.1,200.7 333.9,200.5 335.9,213.8    z").attr({class: 'st3',parent: 'Dividing_Lines','stroke-width': '0','stroke-opacity': '1','fill': '#000000'}).data('id', 'path_ar');
        group_d.attr({'parent': 'Dividing_Lines','name': 'group_d'});
        group_d.region = "st3";
        var group_e = rsr.set();
        var path_as = rsr.path("M 401.1,219.1 412.9,219.4 426.6,219.4 440.5,219.6 448.8,219.7 453.9,219.6 454.1,217 456.6,216.1     457.2,214.9 459,213 461.4,212.6 463.9,212 466.2,211 467.2,209.8 468.9,208.9 468.9,208 472.6,205.6 473.5,206.8 477.1,204.5     478.8,204.7 480.4,202.6 482.2,202.1 482.1,200.8 482.3,200 477.7,200.2 461.6,199.7 454.3,200.2 444.7,199.6 441.6,199.7     435.4,199.4 429.1,199.3 423.3,199.2 416,199.6 415.7,199 414.7,199 414.8,201.1 399.1,201 399,201.7 398.3,203.6 397.5,206.8     397.4,208 396.1,210.2 394.3,211.4 393.9,213.5 392.3,215.2 392.4,219 392.3,219.1    z").attr({class: 'st4',parent: 'Dividing_Lines','stroke-width': '0','stroke-opacity': '1','fill': '#000000'}).data('id', 'path_as');
        var path_at = rsr.path("M 492.1,223.4 492.1,221.3 491.1,219.9 489.5,221.2 489.3,219.2 484.9,218.7 475.1,218.6 469.4,220.8     468.5,221.2 467.5,222.1 466.2,223.9 468.4,225.6 470.5,226.4 472.6,230.8 473.9,233 477.6,236 478.4,237.7 481,239.8     482.2,242.8 485.7,245.5 486.5,248.6 487.3,250.3 487,250.9 488.7,252.1 490,254.9 489.9,256.9 490.4,257.2 491.9,257.7     502.9,251.5 512.1,243.7 516.1,235.2 504.6,223.5    z").attr({class: 'st4',parent: 'Dividing_Lines','stroke-width': '0','stroke-opacity': '1','fill': '#000000'}).data('id', 'path_at');
        var path_au = rsr.path("M 545.4,200.4 534.5,200.4 523,200.6 501.4,200.5 483.8,199.9 483.7,200.9 483.8,203.3 481.3,204     479.5,206.4 477.4,206.1 473.1,208.8 472.2,207.7 470.5,208.8 470.6,209.9 468.2,211.1 467.1,212.3 464.4,213.5 461.7,214.1     459.8,214.5 458.5,215.8 457.7,217.4 455.6,218.1 455.4,219.6 467.9,219.7 468.9,219.4 474.9,217.1 485,217.2 490.8,217.8     490.8,218.2 491.4,217.7 493.7,220.8 493.7,221.8 505.2,221.9 517.3,234.2 520.5,233.6 529.7,227.1 540.2,222.1 546.8,212.7    z").attr({class: 'st4',parent: 'Dividing_Lines','stroke-width': '0','stroke-opacity': '1','fill': '#000000'}).data('id', 'path_au');
        var path_av = rsr.path("M 411,239.5 412.9,222.8 412.4,221 401.1,220.7 391,220.7 390.9,221.5 389,222.4 389,224 387.4,227.9     386,228.7 384.3,230.3 383.2,232.9 380.9,237.3 380.6,240 381.9,243.5 381.4,245.8 382.3,246.6 381.3,248.6 382.8,251.2     382.3,252.8 383.9,255.2 382.1,256.8 381.6,259.2 379.5,261.2 378.6,263.7 377.5,266.9 376.3,268.1 376.6,270.3 385.5,270.7     396.6,270.7 396.2,273.7 395.5,275.6 396,276.7 397.5,278.3 397.9,280.6 398,281.2 403.5,281.3 409.4,278.8 409.1,260.1    z").attr({class: 'st4',parent: 'Dividing_Lines','stroke-width': '0','stroke-opacity': '1','fill': '#000000'}).data('id', 'path_av');
        var path_aw = rsr.path("M 454.6,221.2 448.8,221.3 441.4,221.2 444,236.4 446.6,249.2 448.1,253.1 449.2,255.8 447.3,258.3     446.7,261.9 447.3,264.3 447,266.7 446.8,268.5 447.4,270 447.9,271.4 449.3,274.4 459.8,274.9 477.8,276.8 478.4,278.5     478.7,278.3 478.7,273.7 480.8,273 483.1,274 484.7,274.2 486.6,267.6 490.9,259 489.8,258.6 488.4,257.9 488.4,255.2     487.5,253.1 485.1,251.5 485.6,250.3 485.1,249.1 484.4,246.4 481,243.8 479.7,240.7 477.1,238.6 476.4,237 472.6,234     471.3,231.5 469.4,227.6 467.7,226.9 464.1,224.2 466.2,221.2    z").attr({class: 'st4',parent: 'Dividing_Lines','stroke-width': '0','stroke-opacity': '1','fill': '#000000'}).data('id', 'path_aw');
        var path_ax = rsr.path("M 494.9,308.4 494.9,303.7 490,294.6 485.9,284.3 484.6,275.7 482.7,275.5 480.8,274.7 480.3,274.9     480.2,279 477.7,281 476.7,278.3 459.7,276.5 448.3,275.9 446.7,272.5 425.1,272.6 419.6,273.2 419.6,273.3 422,276.3     421.4,279.3 421.1,279.8 432.2,278.3 442.8,284.1 445.1,287.3 457.1,282.1 463.7,287.2 470.9,294.7 473.5,302 471.6,309.5     472.5,315.1 477.8,323.8 483.4,333.9 487.6,336.7 489.3,341.8 493.9,343.1 497.9,341.3 500,331.4 499.6,320.9    z").attr({class: 'st4',parent: 'Dividing_Lines','stroke-width': '0','stroke-opacity': '1','fill': '#000000'}).data('id', 'path_ax');
        var path_ay = rsr.path("M 418.2,271.8 425,271 446.1,271 445.9,270.6 445.2,268.8 445.5,266.5 445.7,264.4 445.1,262     445.8,257.6 447.4,255.6 446.7,253.7 445.1,249.6 442.5,236.7 439.8,221.2 426.6,221 414,221 414.5,222.7 412.6,239.7     410.7,260.1 411,278.6 419.4,279.9 419.9,278.7 420.3,276.7 417.9,273.7    z").attr({class: 'st4',parent: 'Dividing_Lines','stroke-width': '0','stroke-opacity': '1','fill': '#000000'}).data('id', 'path_ay');
        group_e.attr({'parent': 'Dividing_Lines','name': 'group_e'});
        group_e.region = "st4";
        var group_f = rsr.set();
        var path_az = rsr.path("M 558.7,171.3 556.3,177.3 560,170.7 559.3,170.7    z").attr({class: 'st5',parent: 'Dividing_Lines','stroke-width': '0','stroke-opacity': '1','fill': '#000000'}).data('id', 'path_az');
        var path_ba = rsr.path("M 584.3,87.8 583.7,89.7 585.4,89.9 584.9,102 591.7,102.2 591.3,101.5 592.2,99.4 592.5,95.5     592.9,94.6 593.2,91.1 594.5,87.9 595.4,86.6 596.6,83.3 596.8,80.9 597.3,78.9 599.7,78.1 601.8,76.6 602.1,75.2 601.3,73     602.3,69.6 584.1,69.7 583.9,72.1 583.5,74 583.8,78.3 584.4,80.7 583.3,83.8    z").attr({class: 'st5',parent: 'Dividing_Lines','stroke-width': '0','stroke-opacity': '1','fill': '#000000'}).data('id', 'path_ba');
        var path_bb = rsr.path("M 604.8,117.5 604.1,114.1 600.9,114.2 601,121.4 600.8,122.2 606.6,120.4 606.5,119.1    z").attr({class: 'st5',parent: 'Dividing_Lines','stroke-width': '0','stroke-opacity': '1','fill': '#000000'}).data('id', 'path_bb');
        var path_bc = rsr.path("M 579.4,129.1 578.8,126.1 580.9,124.9 580.4,124.1 581,112.7 583.3,102.7 583.7,91.3 582.4,91.2     582,89.9 582.7,87.7 581.7,83.8 582.8,80.7 582.2,78.5 582,73.9 582.4,71.9 582.6,69.7 567.2,69.8 562.5,72.4 551.8,82.3     552.8,84.2 553.5,90.7 544.8,96 535.7,94.7 527.3,94.2 522.6,95.7 523.8,99.3 523.8,99.4 523.8,99.5 524.1,101.2 514.7,110     514.7,112.8 546.6,112.8 561.6,112.9 564.2,115.4 565.8,117 565.5,118.8 566,120.4 567.6,121.2 569.4,122.3 578.1,128.2     577.4,132.5 583.3,132.5 597,128.7 595.1,127.1    z").attr({class: 'st5',parent: 'Dividing_Lines','stroke-width': '0','stroke-opacity': '1','fill': '#000000'}).data('id', 'path_bc');
        var path_bd = rsr.path("M 568.9,123.8 568.2,124.2 566.4,127.3 564.9,128.3 565.5,130 564.1,131.9 564.1,133.4 565.2,133.8     565.4,135.5 569.1,139.5 567.2,141.6 564.6,143.5 563.8,144.4 561.6,145.7 560.3,146.9 560.5,148.3 561.1,148.2 563.8,152.1     566.4,152.8 566.9,155.2 573.7,146 575.4,136.7 572.4,136.1 576.3,128.8    z").attr({class: 'st5',parent: 'Dividing_Lines','stroke-width': '0','stroke-opacity': '1','fill': '#000000'}).data('id', 'path_bd');
        var path_be = rsr.path("M 603.7,75.1 603.2,77.5 600.4,79.5 598.6,80.1 598.4,81.1 598.1,83.6 596.8,87.3 595.8,88.7     594.7,91.4 594.4,95 594,95.9 593.8,99.8 593,101.4 593.5,102.2 605.7,102.4 606.7,101.1 609.4,99.9 610.4,100.1 611.2,98.6     610.9,98.7 610.3,96.1 608.1,93.8 608.6,92 607.3,65.5 605,65.8 604.2,68.6 604.2,68.7 602.9,73    z").attr({class: 'st5',parent: 'Dividing_Lines','stroke-width': '0','stroke-opacity': '1','fill': '#000000'}).data('id', 'path_be');
        var path_bf = rsr.path("M 609.9,108.9 610,101.6 609.6,101.5 607.7,102.3 606.5,103.9 593,103.8 584.7,103.6 582.7,112.1     590.1,112.3 600.1,112.7 605.3,112.5 606.2,116.7 607.9,118.4 608.2,120.2 612.6,120.4 619.4,118.3 619.5,117.6 613.8,117.2    z").attr({class: 'st5',parent: 'Dividing_Lines','stroke-width': '0','stroke-opacity': '1','fill': '#000000'}).data('id', 'path_bf');
        var path_bg = rsr.path("M 619.6,117.1 620,115 618.9,113.9    z").attr({class: 'st5',parent: 'Dividing_Lines','stroke-width': '0','stroke-opacity': '1','fill': '#000000'}).data('id', 'path_bg');
        var path_bh = rsr.path("M 557,164.6 556.2,146.9 547.4,146.9 538.2,146.8 533.2,146.9 534.3,147.3 535.8,149.4 534.3,149.2     533,150.5 530.8,151.1 529.8,152 529.7,151.9 529.7,152 529.1,152.6 526.1,154.8 526.2,147.9 527,148.1 528,147.2 528.6,146.9     527.1,146.9 526.2,146.9 526.2,146.9 515,146.9 515,145.3 517,145.3 527.1,145.4 530.5,145.3 538.2,145.3 547.4,145.3     556.6,145.3 557.3,144.4 558.7,143.5 561,144.2 562.8,143.2 563.6,142.3 566.1,140.5 567,139.5 563.9,136.2 563.8,134.9     562.5,134.5 562.6,131.4 563.8,129.7 563.1,127.7 565.2,126.2 567.1,123 567.3,122.9 566.9,122.6 564.8,121.5 563.9,118.9     564.1,117.5 563.1,116.5 561,114.4 546.6,114.4 513.2,114.4 513.2,111 506.5,114.4 506.5,133.1 506.5,145.3 512.9,145.3     512.8,145.8 512.6,147.4 509.4,150.9 508,151.7 506.2,152.1 505.1,151.9 503.2,153.8 502.8,156.1 502.4,157.8 500.1,159.1     499.9,156.9 499.6,156.8 498.4,159.1 498.2,162.3 496.4,164.6 494.2,164.9 494.3,165.5 494.2,168.2 495.4,170.3 495.9,172.3     497.4,173.9 498.3,175.3 500.6,175.6 501.2,178.2 502.2,179.2 502.9,179.7 498.1,181.1 496.8,180.2 493.4,181.8 491.2,180.4     489.8,179 489.5,177.8 486.1,181 482.9,182.5 482.7,183.4 481.3,185.1 478.4,186.6 477.4,188 476.5,188.3 487.7,188.7     493.2,188.4 511.4,189 533,189 544.5,188.9 555,188.9 552.3,181.5 550.1,174.8 543.3,167.1 542.8,165.8 541.5,166.2 539.2,165     540.7,161.1 542.5,159.8 542.6,159.1 542.6,158.6 542,157.7 540.1,156.3 537.1,155.2 538,153.5 537.8,153.4 538.2,151.7 540,153     539.4,154.3 540.9,154.9 542.6,156.1 543.5,155.4 545.9,157.9 544.1,159.5 543.9,160.7 542,162 541.1,164.2 541.6,164.5     543.8,163.7 544.6,166.2 549.6,169.3 549.5,158.7 551.3,153.7 552.9,153.9 553.3,164 558.1,169.7 558.5,169.2 561,169     564.7,164.9 564.5,164.6    z").attr({class: 'st5',parent: 'Dividing_Lines','stroke-width': '0','stroke-opacity': '1','fill': '#000000'}).data('id', 'path_bh');
        var path_bi = rsr.path("M 649.9,67.2 642.8,58.5 642.8,37.2 638.6,33.2 631.3,35.9 628,32.1 620.4,43.1 617.1,55.2 613.1,62.5     608.8,65 610.2,92.2 609.9,93.3 611.7,95.4 612.1,96.9 612.2,96.9 616.9,90.2 629.4,81 640,77.5 650,72.9    z").attr({class: 'st5',parent: 'Dividing_Lines','stroke-width': '0','stroke-opacity': '1','fill': '#000000'}).data('id', 'path_bi');
        var path_bj = rsr.path("M 558.9,145.2 558.3,145.6 557.8,146.3 558.5,163 563.8,163 561.3,157 559,149.4 558.7,146.2     559.6,145.4    z").attr({class: 'st5',parent: 'Dividing_Lines','stroke-width': '0','stroke-opacity': '1','fill': '#000000'}).data('id', 'path_bj');
        var path_bk = rsr.path("M 590,113.9 582.5,113.6 581.9,123.6 583.1,125.3 580.5,126.9 580.6,127.2 588.3,124.1 594.7,123.4     599,122.7 599.5,121.2 599.4,114.2    z").attr({class: 'st5',parent: 'Dividing_Lines','stroke-width': '0','stroke-opacity': '1','fill': '#000000'}).data('id', 'path_bk');
        group_f.attr({'parent': 'Dividing_Lines','name': 'group_f'});
        group_f.region = "st5";


        var rsrGroups = [group_a,group_b,group_c,group_d,group_e,group_f];
        Dividing_Lines.push(
        );
        group_a.push(
            path_g ,
            path_h ,
            path_i ,
            path_j ,
            path_k ,
            path_l ,
            path_m ,
            path_n ,
            path_o ,
            path_p
        );
        group_b.push(
            path_q ,
            path_r ,
            path_s ,
            path_t ,
            path_u ,
            path_v ,
            path_w ,
            path_x ,
            path_y ,
            path_z ,
            path_aa ,
            path_ab ,
            path_ac ,
            path_ad ,
            path_ae ,
            path_af
        );
        group_c.push(
            path_ag ,
            path_ah ,
            path_ai ,
            path_aj ,
            path_ak ,
            path_al ,
            path_am
        );
        group_d.push(
            path_an ,
            path_ao ,
            path_ap ,
            path_aq ,
            path_ar
        );
        group_e.push(
            path_as ,
            path_at ,
            path_au ,
            path_av ,
            path_aw ,
            path_ax ,
            path_ay
        );
        group_f.push(
            path_az ,
            path_ba ,
            path_bb ,
            path_bc ,
            path_bd ,
            path_be ,
            path_bf ,
            path_bg ,
            path_bh ,
            path_bi ,
            path_bj ,
            path_bk
        );
        for (var i = 0, len = rsrGroups.length; i <= len; i++) {
            var el = rsrGroups[i];
            if (el) {
                el.mouseover(mouseover.bind(el));
                el.mouseout(mouseout.bind(el));
                el.click(click.bind(el));
            }
        }
    };
    draw(windowWidth, windowHeight);
    function resize() {
        jQuery("#map svg").remove();
        var xw = jQuery('#map').width();
        var xh = windowWidth * 2/3;
        draw(xw, xh)
    }
    jQuery(window).resize(resize);
};