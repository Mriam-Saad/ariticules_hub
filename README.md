# Articles Hub

## Subject
###### Create a website on which a user can see a list of articles editable by a CMS.


## Requirements
###### ● 2 content types
###### ○ An "article" content type with the machine name: "in-article".
###### ○ A "hub" content type with the machine name: "in-hub".
###### --- these two points are implemented in the currentweather_form_alter hook in currentweather.module


###### ● The "Hub" page automatically displays all articles in a grid.
###### --- created a path from the view with page display then overright them from the two files here "\themes\custom\aricleshubtheme\templates\views-overrides\Hub"
###### and the aricles_data variable is from the  aricleshubtheme_preprocess_views_view_fields__all_hubs__page_1 hook in  aricleshubtheme.theme

###### ● The "Article" pages are editable from the CMS, they may contain:
###### ○ Any rich text elements, videos, images.
###### ○ The publication date correctly calculated
###### ○ Social share buttons
###### ○ A back to the hub button
###### ---you will find it in this path "C:\xampp\htdocs\ariticules_hub\web\themes\custom\aricleshubtheme\templates\node\node--in-article" 
###### and the aricles_data variable is from the  aricleshubtheme_preprocess_node hook in  aricleshubtheme.theme also the custom plugin is here 
###### "\themes\custom\aricleshubtheme\templates\system\weather-block.html.twig" and it's variables are from here 
###### "\modules\custom\currentweather\src\Plugin\Block\weatherblock.php"


###### ● Articles should have different taxonomies: "Fashion", "Destinations" and "Food".
###### ● Users should be able to easily navigate between related articles without going back to the hub
###### page.
###### ● Develop my own module which adds the current weather information on every article
###### Stack
