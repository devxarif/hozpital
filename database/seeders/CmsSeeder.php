<?php

namespace Database\Seeders;

use App\Models\Cms;
use Illuminate\Database\Seeder;

class CmsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cms = new Cms;

        // Home Page
        $cms->home_banner_title = 'Our Strength Is Your Well-Being';
        $cms->home_banner_subtitle = 'ENTIRE HOSPITAL SOLUTION';
        $cms->home_banner_description = 'A repudiandae ipsam labore ipsa voluptatum quidem quae laudantium quisquam aperiam maiores sunt fugit, deserunt rem suscipit placeat.';
        $cms->home_banner_button_text = 'Learn More';
        $cms->home_banner_button2_text = 'Contact Us';
        $cms->home_banner_button_url = route('website.about');
        $cms->home_banner_button2_url = route('website.contact');
        $cms->home_banner_bg_image = 'assets/images/bg/home-banner.jpg';

        $cms->home_about_title = 'Personal care & healthy living';
        $cms->home_about_description = 'We provide best leading medicle service Nulla perferendis veniam deleniti ipsum officia dolores repellat laudantium obcaecati neque.';
        $cms->home_about_button_text = 'Services';
        $cms->home_about_button_url = route('website.services');
        $cms->home_about_image = 'assets/images/about/img-1.jpg';
        $cms->home_about_image2 = 'assets/images/about/img-2.jpg';
        $cms->home_about_image3 = 'assets/images/about/img-3.jpg';

        $cms->home_counter_bg_image = 'assets/images/bg/counter-bg.jpg';
        $cms->home_counter_name = 'Happy Patients';
        $cms->home_counter_shortname = 'k';
        $cms->home_counter_count = '60';
        $cms->home_counter2_name = 'Surgery Comepleted';
        $cms->home_counter2_shortname = '+';
        $cms->home_counter2_count = '700';
        $cms->home_counter3_name = 'Expert Doctors';
        $cms->home_counter3_shortname = '+';
        $cms->home_counter3_count = '40';
        $cms->home_counter4_name = 'Worldwide Branch';
        $cms->home_counter4_shortname = '';
        $cms->home_counter4_count = '20';

        $cms->home_service_title = 'Care services';
        $cms->home_service_description = 'Lets know moreel necessitatibus dolor asperiores illum possimus sint voluptates incidunt molestias nostrum laudantium. Maiores porro cumque quaerat.';

        $cms->home_appointment_title = 'Book appoinment';
        $cms->home_appointment_description = 'Mollitia dicta commodi est recusandae iste, natus eum asperiores corrupti qui velit . Iste dolorum atque similique praesentium soluta.';
        $cms->home_appointment_image = 'assets/images/about/img-3.jpg';
        $cms->home_appointment_contact = '+23 345 67980';

        $cms->home_testimonial_title = 'We served over 5000+ Patients';
        $cms->home_testimonial_description = 'Lets know moreel necessitatibus dolor asperiores illum possimus sint voluptates incidunt molestias nostrum laudantium. Maiores porro cumque quaerat.';

        $cms->home_partner_title = 'Partners who support us';
        $cms->home_partner_description = 'Lets know moreel necessitatibus dolor asperiores illum possimus sint voluptates incidunt molestias nostrum laudantium. Maiores porro cumque quaerat.';

        // About Page
        $cms->about_title = 'Personal care
        & healthy living';
        $cms->about_description = 'We provide best leading medicle service Nulla perferendis veniam deleniti ipsum officia dolores repellat laudantium obcaecati neque.';
        $cms->about_image = 'assets/images/about/img-1.jpg';
        $cms->about_image2 = 'assets/images/about/img-2.jpg';
        $cms->about_image3 = 'assets/images/about/img-3.jpg';

        $cms->about_service_title = 'Our Services';
        $cms->about_service_description = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Incidunt, quod laborum alias. Vitae dolorum, officia sit! Saepe ullam facere at, consequatur incidunt, quae esse, quis ut reprehenderit dignissimos, libero delectus.';

        $cms->about_partner_title = 'Partners who support us';
        $cms->about_meet_specialist_title = 'Meet Our Specialist';
        $cms->about_meet_specialist_description = 'Today’s users expect effortless experiences. Don’t let essential people and processes stay stuck in the past. Speed it up, skip the hassles';
        $cms->about_testimonial_title = 'What they say about us';
        $cms->about_testimonial_image = 'assets/images/bg/about-testimonial.jpg';

        // Service page
        $cms->service_title = 'Our Services';
        $cms->service_description = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Incidunt, quod laborum alias. Vitae dolorum, officia sit! Saepe ullam facere at, consequatur incidunt, quae esse, quis ut reprehenderit dignissimos, libero delectus.';

        // Department page
        $cms->department_title = 'Our Departments';
        $cms->department_description = 'Lets know moreel necessitatibus dolor asperiores illum possimus sint voluptates incidunt molestias nostrum laudantium. Maiores porro cumque quaerat.';

        // Appointment page
        $cms->appointment_title = 'Book an appoinment';
        $cms->appointment_description = 'Mollitia dicta commodi est recusandae iste, natus eum asperiores corrupti qui velit . Iste dolorum atque similique praesentium soluta.';

        // Contact page
        $cms->contact_title = 'Contact us';
        $cms->contact_description = 'Laboriosam exercitationem molestias beatae eos pariatur, similique, excepturi mollitia sit perferendis maiores ratione aliquam?';
        $cms->contact_map_location = '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d387193.3059353029!2d-74.25986548248684!3d40.69714941932609!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew%20York%2C%20NY%2C%20USA!5e0!3m2!1sen!2sbd!4v1684858750182!5m2!1sen!2sbd" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>';
        $cms->contact_number = '+823-4565-13456';
        $cms->contact_email = 'contact@mail.com';
        $cms->contact_address = 'North Main Street, New York City';

        // Privacy and Terms Page
        $cms->terms_description = 'These Website Standard Terms and Conditions written on this webpage shall manage your use of our website, Webiste Name accessible at Website.com.

        These Terms will be applied fully and affect to your use of this Website. By using this Website, you agreed to accept all terms and conditions written in here. You must not use this Website if you disagree with any of these Website Standard Terms and Conditions.

        Minors or people below 18 years old are not allowed to use this Website.';
        $cms->privacy_description = 'These Website Standard Terms and Conditions written on this webpage shall manage your use of our website, Webiste Name accessible at Website.com.

        These Terms will be applied fully and affect to your use of this Website. By using this Website, you agreed to accept all terms and conditions written in here. You must not use this Website if you disagree with any of these Website Standard Terms and Conditions.

        Minors or people below 18 years old are not allowed to use this Website.';

        $cms->save();
    }
}
