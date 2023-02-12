<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Store;
use App\Models\StoreCategory;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class BlogSeeder extends Seeder
{
        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run()
        {
                $faker = Faker::create();

                $cbdBlogs = [
                        [
                                'title' => "CBD for Athletes: What You Need to Know",
                                'thumbnail' => 'https://no.gatezencbd.com/wp-content/uploads/2022/07/cbd-athletes-blog-1.jpg',
                                'content' => "Athletes put a lot of stress on our bodies, to positive and negative effect. Training stress stimulates adaptation and increased performance, but physical trauma and prolonged wear and tear also lead to injuries and pain. Current methods of pain management are effective, but they’re also killing people. In search of improved sports recovery and safer pain relief, many people are asking about cannabidiol or CBD for athletes. Should you?

Chronic use of over-the-counter pain relievers (i.e. NSAIDs like ibuprofen and naproxen sodium) poses greater health risk than previously known, and we are in the midst of an epidemic of opioid addiction and overdoses that kill tens of thousands of Americans annually. In such a landscape, athletes are rightly curious about and eager for cannabidiols’ (CBD) promises of pain relief and reduced inflammation without the risks associated with NSAIDs or opioids."
                        ],
                        [
                                'title' => "6 Myths about CBD",
                                'thumbnail' => 'https://no.gatezencbd.com/wp-content/uploads/2022/07/cbd-myths-blog-1.jpg',
                                'content' => "MYTH 1 - CBD doesn't work
Fact: There are several reasons why CBD may not work for you, but it can simple take some time to find the optimal serving for you or to begin feeling its effects. When using CBD, try to account for other issues that may affect how your body reacts to it.
                
MYTH 2 - CBD is just a fad
Fact: CBD is actually increasing in popularity and visibility, as knowledge about it becomes more widespread. In addition to being very safe and very accessible, CBD can be taken in a wide variety of forms that are convenient to your lifestyle.
                
MYTH 3 - CBD is illegal
Fact: Unlike THC, which is illegal in some countries, CBD is legal as long as it follows a few federal quidelines regarding its origin and THC content.
                
MYTH 4 - CBD oil will get you high
Fact: Where THC is the chemical in marijuana responsible for its psychoactive effects, CBD does not work the same way. They are very similar molecularly but CBD delivers its many benefits without the “high” feeling that THC provides.
                
MYTH 5- CBD oil is dangerous and unhealthy
Fact: In a 2017 World Health Organization report, CBD is described as exhibiting “no effects indicative of any abuse or dependence potential” and “well tolerated with a good safety profile.” It is all natural and non-habit forming, with little chance of side effects.

MYTH 6 - CBD is addictive
Fact: CBD oil is non addictive. Even better it may be helpful in fighting addiction. CBD helps to relieve the painful and persistent symptoms of withdrawal, along with the intensity of cravings, which can also lessen the chances of a relapse."
                        ],
                        [
                                'title' => "CBD Health Benefits",
                                'thumbnail' => 'https://no.gatezencbd.com/wp-content/uploads/2022/07/cbd-health-blog-1-2.jpg',
                                'content' => "• Offset Anxiety and Depression
        CBD’s ability to calm is perhaps its most popular effect and the reason its use is so widespread. A 2017 study in the Brazilian Journal of Psychiatry
tested the anxiety levels of 57 men in a simulated public speaking test. Some received a placebo while others received either 150 milligrams, 300
milligrams or 600 milligrams of CBD before their speeches. Those who received 300 milligrams of CBD experienced significantly reduced anxiety
during the test compared to those who received the placebo. Interestingly, participants who received either 150 or 600 milligrams of CBD
experienced more anxiety during the test than the 300 milligrams group.

        Meanwhile, at least one study in mice revealed CBD had effects similar to the antidepressant imipramine. Human trials are needed, though,
to confirm whether CBD can induce this same antidepressant reaction in our bodies.

• Treat Select Epilepsy Syndromes

In some instances, CBD can be used to treat epileptic seizures.

In 2018, the Food and Drug Administration (FDA) approved the use of CBD under the brand name Epidiolex to treat seizures resulting from Lennox-
Gastaut syndrome and Dravet syndrome—two rare forms of epilepsy—in patients at least 2 years old.
                
Three well-vetted studies provide the basis of support for the FDA’s decision. In these trials, 516 patients with Lennox-Gastaut syndrome or Dravet syndrome received either Epidiolex or a placebo. Epidiolex, when taken along with other prescribed medications, decreased the frequency of participants’ seizures compared to the placebo.

• Reduce PTSD Symptoms

        In a small 2018 study in the Journal of Alternative and Complementary Medicine, 11 people with post-traumatic stress disorder (PTSD) received CBD along with routine psychiatric care for eight weeks in an outpatient psychiatric clinic. Ten of the 11 experienced a decrease in their PTSD symptoms. CBD was generally well tolerated, the researchers write.

Margaret Rajnic, a doctor of nursing practice experienced in medical cannabis and CBD, emphasizes the importance of using therapy in tandem with any type of cannabis or CBD for PTSD. “There is an amount of therapy that is needed for PTSD,” she says. “But CBD will give you that little bit of decreased anxiety.”

Four other human trials from 2012 to 2016 suggest CBD reduces PTSD symptoms, although some include THC, or tetrahydrocannabinol, the main mind-altering element in cannabis. When THC and CBD work together, they create what’s called an “entourage effect,” complementing each other’s benefits and potency. For example, taking the same dose of THC and CBD together tempers the “high” from THC, while just a little THC paired with more CBD enhances the effects of the CBD.

• Treat Opioid Addiction

        Some studies—both preclinical animal and human clinical trials—suggest CBD could be used to help treat people who are dependent on opioids.

In one such study, researchers administered CBD to people with heroin use disorder. Over the course of a week, CBD significantly reduced heroin users’ cue-induced cravings, withdrawal anxiety, resting heart rate and salivary cortisol levels. No serious adverse effects were found.
                
Amyotrophic lateral sclerosis (ALS) is a disease that causes nerve cells in the brain and spinal cord to deteriorate, resulting in loss of muscle control that worsens over time. It’s not yet understood exactly why ALS occurs, although it can be hereditary in some cases. There’s no known cure, and there are only two FDA-approved medications to help treat ALS symptoms.
                
Research suggests people with ALS can benefit from the entourage effect created by the combination of THC and CBD, similar to people with PTSD. In a 2019 study, patients received a combination of THC and CBD in varying doses depending on their needs and preferences. Those with mild, moderate or severe spasticity (muscle tightness and stiffness) due to ALS reported high levels of satisfaction with the treatment, and those with moderate to severe spasticity reported higher satisfaction rates than those with mild spasticity.
                
• Alleviate ALS Symptoms

        Amyotrophic lateral sclerosis (ALS) is a disease that causes nerve cells in the brain and spinal cord to deteriorate, resulting in loss of muscle control that worsens over time. It’s not yet understood exactly why ALS occurs, although it can be hereditary in some cases. There’s no known cure, and there are only two FDA-approved medications to help treat ALS symptoms.

Research suggests people with ALS can benefit from the entourage effect created by the combination of THC and CBD, similar to people with PTSD. In a 2019 study, patients received a combination of THC and CBD in varying doses depending on their needs and preferences. Those with mild, moderate or severe spasticity (muscle tightness and stiffness) due to ALS reported high levels of satisfaction with the treatment, and those with moderate to severe spasticity reported higher satisfaction rates than those with mild spasticity.

• Relieve Unmanageable Pain

        In 2005, Canada approved the use of Sativex, an oromucosal (absorbed in the lining of the mouth) spray with equal proportions of THC and CBD, for the treatment of multiple sclerosis-related central neuropathic pain. In 2007, Canada approved the medicine’s use again for cancer pain that proved unresponsive to other medications.

Meanwhile, continued studies in the U.S. indicate CBD is effective in treating chronic, non-cancer pain. In one 2020 study, researchers administered CBD topically to a group of patients with symptomatic peripheral neuropathy (a result of brain nerve and spinal cord nerve damage) while another group with the same condition received a placebo. Results showed a significant reduction in intense, sharp pains and cold, itchy sensations in those who used the topical CBD compared to those who used the placebo. No participants reported adverse side effects.

When introduced topically, CBD oil doesn’t affect the systemic issue as it might if it were introduced directly into the bloodstream. Instead, topical CBD is more localized and treats pain in a certain area. Since it’s more direct, it may have a more pronounced effect.

• Ease Diabetic Complications

        or starters, tests on human cells found that CBD helps reduce the effects of high glucose levels on other cells in the body, which typically precedes the development of diabetes and various complications. Researchers concluded that with further studies, CBD could have significant benefits when used in patients with diabetes, diabetic complications and plaque buildup in artery walls.

In another small study, 13 patients with type 2 diabetes who weren’t on insulin treatment were given both CBD and a placebo (in lieu of insulin). Researchers found CBD decreased their levels of resistin (which causes resistance to insulin, the protein that regulates sugar levels) and increased their levels of glucose-dependent insulinotropic peptide (a hormone that ensures a sufficient release of insulin from digested food) compared to their baselines before they started the test. These results suggest CBD could be a natural treatment for diabetes by helping the body regulate insulin-related hormone levels.

• Protect Against Neurological Disease

        Preclinical and clinical studies show that CBD has antioxidant and anti-inflammatory properties. Researchers deduce these characteristics can provide significant neuroprotection, or protection against numerous pathological disorders.

Several preclinical studies suggest CBD can produce beneficial effects against Parkinson’s disease, Alzheimer’s disease and multiple sclerosis. Huntington’s disease and cerebral ischemia were also tested, although significant positive results were not recorded. Further clinical studies are needed to confirm CBD’s benefits when used as a treatment for these disorders.

• Inhibit Arthritis Symptoms

        Arthritis involves the deterioration of the tissues in and around your joints. There are several types of arthritis, and symptoms include pain, stiffness and loss of motion. Arthritis treatment usually targets pain relief and improved joint function.

A 2006 study found that Sativex—a CBD-based botanical drug approved in the United Kingdom in 2010—promoted statistically significant improvements in quality of sleep, pain during movement and pain at rest in patients with rheumatoid arthritis when compared to a placebo. It was the first controlled trial of Sativex as a treatment for rheumatoid arthritis, involving 58 patients. CBD was found to have a pain-relieving effect, as well as an ability to suppress disease activity.

In 2018, in a study of more localized treatment, researchers administered a synthetic CBD gel in either 250-milligram or 500-milligram doses daily or a placebo to patients with knee pain due to osteoarthritis. Patients also stopped taking any other anti-inflammatory medications or painkillers, with the exception of acetaminophen, before and during the study period.

The results were interesting, although not entirely conclusive. On one hand, those treated with CBD did not experience much change in pain when compared with placebo patients. On the other hand, there were statistically significant differences between the group receiving the 250-milligram dose and the placebo group when measuring the average weekly improvement of their worst pain levels and their WOMAC (Western Ontario and McMaster Universities Arthritis Index) physical function rating. Additionally, men seemed to benefit from CBD more significantly than women in this test."
                        ],
                        [
                                'title' => "CBD or CBG – Which to choose?",
                                'thumbnail' => 'https://no.gatezencbd.com/wp-content/uploads/2022/07/cbdvscbg-2-11-2048x1366.jpg',
                                'content' => "CBD and THC are definitely two of the most well-known cannabinoids. CBD is known for its calming, therapeutic effects while THC is famous for its
psychoactive effects that cause feelings of euphoria and sometimes confusion. While CBD and THC have both had plenty of time in the spotlight,
lesser-known cannabinoids, such as CBG, are capturing interest from consumers and scientists alike.

Initial studies show that CBG may have similar characteristics of CBD. Both of these cannabinoids have no psychoactive properties. Instead,
they offer antioxidant, anti-inflammatory, neuroprotective, and analgesic properties.

Which should I choose?

Cannabidiol CBD

• Autoimmune diseases (Rheumatoid arthritis, Hashimoto, Graves’ disease, Type 1 Diabetes, etc)
• Neurological diseases (Parkinson’s disease, Idiopathic tremor, MigraInes, Multiple sclerosis, Tourette’s Syndrome, etc.
• Diffuse Developmental Disorders (Autism, Rett Syndrome, etc.
• Neuropathic Pain (Arthritis, Muscle injuries, etc.)
• Analgesic, anxiolytic and antioxidant properties (Insomnia, anxiety disorders, etc.)
• Inflammatory skin diseases (Psoriasis, Eczema, Acne, Dermatitis, etc.)
• Preventive Treatment (Strengthening the immune system, etc.)
• Cancer (anti-cancer properties, relief of symptoms of chemotherapy, etc.)

Cannabigerol CBG

• Brain health (Alzheimer, dementia, epilepsy, types of dyspraxia due to stroke, etc.)
• Eye Health (Glaucome, Increased intraocular pressure, etc.)
• Urinary Tract Health (Urinary Track Infection, prostate, etc.)
• Antibacterial and anti-fungal properties (skin diseases due to infections, fungal infections, etc.)
• Psoriasis
• Cancel (anti-cancer properties, relief of symptoms of chemotherapy, etc.)"
                        ],
                        [
                                'title' => "CBD For Sleep",
                                'thumbnail' => 'https://no.gatezencbd.com/wp-content/uploads/2020/07/woman-sleep.jpg',
                                'content' => "Lack of sleep is becoming an epidemic, and CBD is one of the most popular sleep aids of the moment."
                        ],
                        [
                                'title' => "CBD Oil vs Hemp Seed Oil: What’s the Difference?",
                                'thumbnail' => 'https://no.gatezencbd.com/wp-content/uploads/2020/07/cbd-vs-hemp.jpg',
                                'content' => "Hemp is a popular wellness supplement these days, but there’s still a lot of confusion surrounding it. For instance, people often ask what the difference is between CBD oil and hemp seed oil. Some folks use the terms interchangeably, but are they actually the same thing? 

Not at all.
                                
If you’re looking for therapeutic relief in some form or another, you won’t find it with hemp seed oil. It doesn’t have the necessary hemp plant compounds to make that happen. 
                                
On the other hand, CBD oil does provide the therapeutic benefits you’re looking for, since it possesses a wide range of cannabinoids and beneficial terpenes. 
                                
Hemp-derived CBD products and hemp seed oil are both products of the cannabis hemp plant, but there are some pretty distinct differences in benefits. Let’s take a look!

• WHAT IS HEMP SEED OIL?

Most people are surprised to find out hemp seed oil isn’t capable of any therapeutic effects, especially compared to what you expect from CBD oil. 

Hemp seed oil comes from hemp seeds, of course, and it’s most known for its ability to deeply nourish the skin. This is one of the main reasons you’ll see hemp seed oil in various skincare products. It’s non-comedogenic and does have anti-inflammatory properties when applied topically to the skin. 

The anti-inflammatory properties of hemp seed oil work well for many skin issues, like eczema, psoriasis, rashes, and acne. This is why hemp seed oil is often used in hair and skin formulations. 

Since hemp seed oil comes from the part of the cannabis plant that doesn’t have cannabinoid content, it’s simply not capable of producing any therapeutic effects — but CBD oil does.

• WHAT IS CBD OIL?

CBD, or cannabidiol, is a type of compound known as a cannabinoid. CBD oil comes from the buds, stems, and leaves of the hemp plant — where cannabinoids and other helpful compounds live and are ultimately extracted and processed into CBD oil for your benefit. 

CBD oil is often blended with another fatty oil, like MCT oil, to increase absorption and effectiveness. When added to your wellness regimen, CBD can help you experience a wide range of therapeutic effects (which we’ll discuss below). 

There are different types of CBD oil — full spectrum CBD, broad spectrum CBD, and CBD isolate. They have some similarities, but the main difference is the number of extraction processes used to remove trace amounts of THC.

When you take a wellness supplement, you expect that it will provide some benefit. With hemp-derived CBD products, this job is handled by cannabinoids. CBD is one of the cannabinoids that presents the widest range of benefits.

• WHAT DO CANNABINOIDS DO?

Cannabinoids target receptors in your endocannabinoid system (ECS), which help the body to maintain balance, or homeostasis, for a number of crucial functions, including sleep, mood, memory, appetite, stress, immune, pain management, motor control, and more.

The amount of cannabinoids your CBD oil contains depends on the type of product you have — full spectrum products boasting the most cannabinoids, since they contain the “full spectrum” of the plant’s natural composition. Full spectrum CBD is the CBD oil exactly as it is extracted from the hemp plant, containing all of the plant’s cannabinoids, terpenes, flavonoids, and even some healthy fatty acids. 

Broad spectrum CBD is the same oil, but has been filtered to remove the trace amounts of THC that exist in full spectrum oil. In the process, this removes a few of the other cannabinoid compounds. Still, broad spectrum CBD is a robust and effective oil. Broad spectrum CBD also has the benefit of having all detectable levels of THC removed, so there’s almost no chance you can get a false positive result on a drug test from taking it. CBD isolate is CBD with all other plant materials removed, making it 99% pure CBD.

• WHY DOESN’T EVERYONE USE FULL SPECTRUM CBD?

Even though legally grown hemp products are required to have no more than 0.2% THC content in the UK, regulating this number can be tough. This is made more difficult since the legal THC threshold in the US, which provides much of the higher quality CBD for the UK, is less than 0.3%. So, full spectrum CBD oil is likely to contain more THC than is legal in the UK.

 For this reason, most CBD that is sold in the UK is either broad spectrum CBD or CBD isolate. And legal CBD products in the UK that are labelled as “full spectrum” are generally not actual full spectrum CBD at all.

Both full spectrum and broad spectrum formulations can provide therapeutic effects, though full spectrum contains a few more cannabinoids. Today’s broad spectrum CBD oils are formulated to contain more cannabinoids and in higher quantities (such as the bonus CBG in our CBD + CBG Oil Wellness Tincture). So at the end of the day, a good, high-quality broad spectrum CBD oil will do the job just fine.

• SHOPPING FOR THE BEST CBD OIL

When you’re shopping for CBD oil online, you want to shop with confidence — knowing you picked the right product for your needs. But how do you avoid fake CBD products? First and foremost, check to see if what you’re purchasing is CBD oil and not hemp seed oil. Some CBD products have hemp in the name (including our own CBD Oil Hemp Tincture). Make sure to check the ingredients to verify that hemp doesn’t mean hemp seed.

Aside from identifying this verbiage, you should always shop for naturally grown CBD products. They generally work better, and they don’t contain any of the harmful residues that result from synthetic pesticides and fertilisers. There are legal issues for CBD brands claiming that their products are organic — even if they are organic. Fortunately, there’s a way to verify the purity of your CBD product. (More on that in a minute.)

Another thing you want to look for is how the CBD in your product was extracted from the hemp plant. Look for brands that use carbon dioxide for CBD oil extraction. It’s more efficient than solvents (which means more CBD for you!) and, more importantly, it doesn’t leave behind chemical residue.

The next thing to look for is a lab report. This report will verify that the cannabinoids you’ve been promised on the label are actually in the product. And it will show whether or not your product contains any of the harmful chemicals we’ve mentioned that result from not farming organically or using proper extraction methods. Reputable CBD vendors provide their customers with lab reports, conducted by impartial third-party labs, to prove the quality and effectiveness of their products.

• SHOPPING FOR THE BEST CBD OIL

Hemp seed oil is great for skin care. But hemp seed oil isn’t the same as CBD oil. So, if you’re looking for the calming wellness benefits of CBD, make sure to keep this article in mind as you shop. We hope you find the perfect CBD product for your needs!"
                        ]
                ];

                foreach ($cbdBlogs as $cbdBlog) {
                        $templateName = $faker->name();
                        $imageUrl = 'https://ui-avatars.com/api/?name=' . str_replace(' ', '-', $templateName) . '&size=180&background=A178E3&color=FFFFFF&rounded=true&font-size=0.30';
                        Blog::create([
                                'thumbnail_url' => $cbdBlog['thumbnail'],
                                'title' => $cbdBlog['title'],
                                'content' => $cbdBlog['content'],
                                'store_category_id' => 10, //CBD
                                'blog_category_id' => 1, //General
                        ]);
                }

                $saintRochesBlogs = [
                        [
                                'thumbnail' => "https://saintroches.gatezen.co/wp-content/uploads/2022/09/capture-one-catalog28769_marc_ruler_turtle_webb-640x800-1.jpg",
                                'title' => "CONFIDENT AT A COFFEE SHOP IN BEVERLY HILLS?",
                                'content' => "Marc Ruler Sunglasses is Saint Rochés new everyday classic. The aesthetic is bold and makes a statement. The cat-eyed and sharp lines gives a sophisticated look and feel. The masculine unisex model is made in high quality acetate and comfort with Saint Rochés logo decoration on the temple. The model have several frame and lens colors. The model is made for all the confident successful fashion-icons out there, that enjoying an espresso at their favourite coffee shop in Beverly Hills a sunny Tuesday. ..but the model works fine another day, on another place, in another city as well 🙂"
                        ],
                        [
                                'thumbnail' => "https://saintroches.gatezen.co/wp-content/uploads/2022/09/94E36A44-7206-4505-B391-077406B17503.jpeg",
                                'title' => "SAINT ROCHÉS STARTS SPONSORING THREADS OF HOPE",
                                'content' => "Athens is one of the largest hubs for human trafficking in Europe. In the middle of this works and operates Threads Of Hope.

Threads Of Hope employs women who have escaped a life of injustice and exploitation due to human trafficking. It´s a non-profit business that provide life-changing opportunities through education and employment in their sewing factory.
                                
Threads Of Hope´s fantastic work, gives hope and change women’s life on daily basis. That´s something we want to support. Therefor we have decided to donate 1% of our annual net earnings to Threads Of Hope.
                                
Make a change! Help them help women! Sponsor them or buy a product in their web shop. By buying a product from Threads Of Hope, you contribute to making it possible for these women to rebuild their lives again.
                                
Go to: www.threadsofhopehellas.org
                                
Follow them on Instagram:  @threadsofhopehellas"
                        ],
                        [
                                'thumbnail' => "https://saintroches.gatezen.co/wp-content/uploads/2022/09/9C98A3A9-E5ED-4C42-887D-04C30ED77CD7.png",
                                'title' => "LUXURY MAGAZINE CONNOISSEUR",
                                'content' => "Saint Rochés in good company with Louis Vuitton, Dior, Cartier and Guess when the luxury magazine Connoisseur chose five sunglass brands in latest issue “Summer News”.

We want to celebrate that by sending you a summer gift of 20% discount on our website. Use the code midsummer20 and go get your favourite Saint Rochés shades for the summer.
                                
(Note. the discount code is valid until June 25th , only on www.saintroches.gatezen.co The code can not be used with other discounts or vouchers.)"
                        ],
                        [
                                'thumbnail' => "https://saintroches.gatezen.co/wp-content/uploads/2022/09/dsc3347-scaled-e1591620072627-640x800-1.jpg",
                                'title' => "THE SUN NEVER SETS!",
                                'content' => "In mid-June, school is out and nature has burst into life. It seems like the sun never sets. In fact, in the north of Sweden it doesn’t and in the south only for a hour or two.

Prepare yourself to celebrate the iconic midsummer weekend, when the sun never sets, with a new pair of Saint Rochés Sunglasses.
                                
USE CODE: MIDSUMMER15
                                
..when you order your favourite Saint Rochés models and we give you 15% off !!

(Note. the discount code is valid until June 25th , only on www.saintroches.gatezen.co The code can not be used with other discounts or vouchers.)"
                        ],
                        [
                                'thumbnail' => "https://saintroches.gatezen.co/wp-content/uploads/2022/09/dsc4371-scaled-e1591013504182-640x800-1.jpg",
                                'title' => "START JUNE WITH ATTITUDE DEAL",
                                'content' => "A small accessory as sunglasses can change the look, the style ,the attitude and be that piece that makes you go from looking good to looking great.

START JUNE WITH A NEW ATTITUDE
                                
Use the code: juneattitude
                                
..and get 10% discount in our webstore where you also find this new super cool aviator model:
                                
LEO PILOT SUNGLASSES IN BROWN TURTLE
                                
(Note. the discount code is valid until June 7th only on www.saintroches.gatezen.co and can not be used with other discounts or vouchers.)"
                        ],
                        [
                                'thumbnail' => "https://saintroches.gatezen.co/wp-content/uploads/2020/01/50829FFE-E8C9-492A-B2B3-70EE305433DE.jpeg",
                                'title' => "THE NEW EVERYDAY CLASSIC",
                                'content' => "Marc Ruler Sunglasses is Saint Rochés new everyday classic. The aesthetic is bold and makes a statement. The cat-eyed and sharp lines gives a sophisticated look and feel. The masculine unisex model is made in high quality acetate and comfort with Saint Rochés logo decoration on the temple. The model have several frame and lens colors."
                        ],
                ];

                foreach ($saintRochesBlogs as $saintRochesBlog) {
                        Blog::create([
                                'thumbnail_url' => $saintRochesBlog['thumbnail'],
                                'title' => $saintRochesBlog['title'],
                                'content' => $saintRochesBlog['content'],
                                'store_category_id' => 4, //Saint Roches Sunglasses
                                'blog_category_id' => 1, //General
                        ]);
                }
        }
}
