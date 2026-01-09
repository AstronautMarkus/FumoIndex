@extends('layouts.app')

@section('title' , 'Terms and Conditions')

@section('content')
<div class="flex flex-col items-center justify-center">
    <div class="max-w-6xl w-full bg-container backdrop-blur-sm rounded-3xl shadow-2xl border-4 border-secondary p-8 m-4 relative">
        <span class="absolute top-4 right-8 text-sm text-gray-500">Last updated: January 9, 2026</span>
        <h1 class="font-bold mb-6 text-center text-primary mt-6">Terms and Conditions of Use</h1>

        <h2 class="font-bold mb-4 text-primary">1. Acceptance of Terms</h2>
        <p class="mb-4">By accessing and using FumoIndex (hereinafter, "the Service"), you agree to be bound by these Terms and Conditions. If you do not agree with any part of these terms, you must not use this service.</p>

        <h2 class="font-bold mb-4 text-primary">2. Service Description</h2>
        <ul class="mb-4 list-disc pl-6">
            <li>Non-official FumoFumo product database</li>
            <li>Search and filter system by character, product type, rarity, and franchise</li>
            <li>Image galleries and product comparisons</li>
            <li>Collaborative wiki-style site</li>
            <li>Tagging system for special events and regional exclusives</li>
        </ul>

        <h2 class="font-bold mb-4 text-primary">3. Nature of the Project</h2>
        <h4 class="font-semibold mb-2">3.1 Fan Project</h4>
        <p class="mb-4">FumoIndex is a <strong>fan-made, non-commercial project</strong> for educational, archival, and preservation purposes.</p>
        <h4 class="font-semibold mb-2">3.2 No Official Affiliation</h4>
        <p class="mb-4">This project is NOT affiliated with, endorsed, or sponsored by:</p>
        <ul class="mb-4 list-disc pl-6">
            <li>Gift Co. Ltd.</li>
            <li>Team Shanghai Alice (ZUN)</li>
            <li>AmiAmi</li>
            <li>Any other company or brand related to FumoFumo products</li>
        </ul>

        <h2 class="font-bold mb-4 text-primary">4. Intellectual Property</h2>
        <h4 class="font-semibold mb-2">4.1 Third-Party Content</h4>
        <p class="mb-4">All characters, designs, product names, trademarks, logos, and product images mentioned on FumoIndex are property of their respective owners, including but not limited to:</p>
        <ul class="mb-4 list-disc pl-6">
            <li>Team Shanghai Alice (ZUN) - Touhou Project</li>
            <li>Gift Co. Ltd. - FumoFumo product line</li>
            <li>ANGELTYPE - Original concept</li>
            <li>Other licensees and manufacturers</li>
        </ul>
        <h4 class="font-semibold mb-2">4.2 Use of Images and Data</h4>
        <p class="mb-4">All multimedia content (images, product photos, logos) is used exclusively for:</p>
        <ul class="mb-4 list-disc pl-6">
            <li>Archival documentation</li>
            <li>Product identification</li>
            <li>Educational and historical preservation purposes</li>
        </ul>
        <p class="mb-4">We do not claim ownership of any third-party content.</p>
        <h4 class="font-semibold mb-2">4.3 Project Content</h4>
        <p class="mb-4">The source code, database structure, and original documentation of FumoIndex are licensed under the <strong class="text-primary hover:underline"><a href="https://github.com/AstronautMarkus/FumoIndex/blob/main/LICENSE" target="_blank" rel="noopener noreferrer">FumoIndex Custom License (FCL) v1.0</a></strong>.</p>

        <h2 class="font-bold mb-4 text-primary">5. User Account</h2>
        <h4 class="font-semibold mb-2">5.1 Registration</h4>
        <p class="mb-4">To access certain features (such as wiki contributions or community participation), you may need to create an account.</p>
        <h4 class="font-semibold mb-2">5.2 User Responsibility</h4>
        <ul class="mb-4 list-disc pl-6">
            <li>Keep your password confidential</li>
            <li>All activities performed under your account</li>
            <li>Provide accurate information during registration</li>
        </ul>
        <h4 class="font-semibold mb-2">5.3 Account Requirements</h4>
        <ul class="mb-4 list-disc pl-6">
            <li>You must be at least 13 years old to create an account</li>
            <li>You must provide truthful and up-to-date information</li>
            <li>You may not create multiple accounts or transfer your account to third parties</li>
        </ul>

        <h2 class="font-bold mb-4 text-primary">6. User Conduct</h2>
        <h4 class="font-semibold mb-2">6.1 Acceptable Use</h4>
        <ul class="mb-4 list-disc pl-6">
            <li>Comply with applicable laws</li>
            <li>Do not post false, misleading, or defamatory content</li>
            <li>Do not attempt to disrupt or compromise the security of the service</li>
            <li>Do not use the service for commercial purposes without authorization</li>
            <li>Respect intellectual property rights</li>
            <li>Maintain respectful behavior towards other users</li>
        </ul>
        <h4 class="font-semibold mb-2">6.2 Prohibitions</h4>
        <ul class="mb-4 list-disc pl-6">
            <li>Selling, reselling, or commercializing access to the service</li>
            <li>Using bots, scrapers, or automated tools without explicit permission</li>
            <li>Impersonating other users or administrators</li>
            <li>Posting offensive, discriminatory, or obscene content</li>
            <li>Attempting to hack, exploit vulnerabilities, or perform reverse engineering</li>
            <li>Falsely representing FumoIndex as an official project</li>
        </ul>

        <h2 class="font-bold mb-4 text-primary">7. User Contributions</h2>
        <h4 class="font-semibold mb-2">7.1 User-Generated Content</h4>
        <ul class="mb-4 list-disc pl-6">
            <li>You retain copyright to your original content</li>
            <li>You grant FumoIndex a worldwide, non-exclusive, royalty-free license to use, modify, and distribute your contributions</li>
            <li>You guarantee that you have the necessary rights to the content you submit</li>
            <li>Your contribution may be edited or deleted by moderators</li>
        </ul>
        <h4 class="font-semibold mb-2">7.2 Moderation</h4>
        <ul class="mb-4 list-disc pl-6">
            <li>Review and moderate all contributions</li>
            <li>Remove content that violates these terms</li>
            <li>Suspend or terminate accounts that break the rules</li>
        </ul>

        <h2 class="font-bold mb-4 text-primary">8. Privacy and Data</h2>
        <h4 class="font-semibold mb-2">8.1 Data Collection</h4>
        <ul class="mb-4 list-disc pl-6">
            <li>Account information (name, email)</li>
            <li>Usage and browsing data</li>
            <li>Session information</li>
        </ul>
        <h4 class="font-semibold mb-2">8.2 Data Use</h4>
        <ul class="mb-4 list-disc pl-6">
            <li>Provide and improve the service</li>
            <li>Service-related communications</li>
            <li>Compliance with legal obligations</li>
        </ul>
        <h4 class="font-semibold mb-2">8.3 Data Protection</h4>
        <p class="mb-4">We are committed to protecting your personal information in accordance with applicable data protection laws.</p>

        <h2 class="font-bold mb-4 text-primary">9. Service Availability</h2>
        <h4 class="font-semibold mb-2">9.1 No Guarantee of Availability</h4>
        <p class="mb-4">FumoIndex is provided "as is" without guarantees of continuous availability. We may:</p>
        <ul class="mb-4 list-disc pl-6">
            <li>Suspend the service temporarily or permanently</li>
            <li>Perform maintenance without prior notice</li>
            <li>Modify or discontinue features</li>
        </ul>
        <h4 class="font-semibold mb-2">9.2 No Warranties</h4>
        <ul class="mb-4 list-disc pl-6">
            <li>We do NOT guarantee the absolute accuracy of catalog information</li>
            <li>Uninterrupted service availability</li>
            <li>The absence of errors or bugs</li>
        </ul>

        <h2 class="font-bold mb-4 text-primary">10. Limitation of Liability</h2>
        <h4 class="font-semibold mb-2">10.1 Use at Your Own Risk</h4>
        <ul class="mb-4 list-disc pl-6">
            <li>Loss of data</li>
            <li>Service interruptions</li>
            <li>Decisions made based on catalog information</li>
            <li>Direct, indirect, incidental, or consequential damages</li>
        </ul>
        <h4 class="font-semibold mb-2">10.2 Third-Party Content</h4>
        <ul class="mb-4 list-disc pl-6">
            <li>The accuracy of third-party product information</li>
            <li>External links or third-party resources</li>
            <li>Transactions made outside the platform</li>
        </ul>

        <h2 class="font-bold mb-4 text-primary">11. Copyright and DMCA</h2>
        <h4 class="font-semibold mb-2">11.1 Respect for Copyright</h4>
        <p class="mb-4">We respect intellectual property rights. If you believe your content has been used inappropriately:</p>
        <ul class="mb-4 list-disc pl-6">
            <li>You may contact us via GitHub Issues at: <a href="https://github.com/AstronautMarkus/FumoIndex/issues" target="_blank" rel="noopener noreferrer" class="text-primary hover:underline">https://github.com/AstronautMarkus/FumoIndex/issues</a></li>
            <li>Clearly describe the copyrighted material</li>
            <li>Provide valid contact information</li>
            <li>Include a good faith statement</li>
        </ul>
        <h4 class="font-semibold mb-2">11.2 Response to Notifications</h4>
        <ul class="mb-4 list-disc pl-6">
            <li>Review all legitimate requests</li>
            <li>Remove or modify content when appropriate</li>
            <li>Respond within a reasonable timeframe</li>
        </ul>

        <h2 class="font-bold mb-4 text-primary">12. Changes to Terms</h2>
        <h4 class="font-semibold mb-2">12.1 Changes</h4>
        <p class="mb-4">We reserve the right to modify these terms at any time. Changes will take effect:</p>
        <ul class="mb-4 list-disc pl-6">
            <li>Immediately after publication for new users</li>
            <li>After 30 days of notification for existing users</li>
        </ul>
        <h4 class="font-semibold mb-2">12.2 Notification</h4>
        <ul class="mb-4 list-disc pl-6">
            <li>Notice on the website</li>
            <li>Email notification (if applicable)</li>
            <li>Update of the date in these terms</li>
        </ul>

        <h2 class="font-bold mb-4 text-primary">13. Termination</h2>
        <h4 class="font-semibold mb-2">13.1 By the User</h4>
        <p class="mb-4">You may stop using the service at any time and request deletion of your account.</p>
        <h4 class="font-semibold mb-2">13.2 By FumoIndex</h4>
        <p class="mb-4">We may suspend or terminate your access if:</p>
        <ul class="mb-4 list-disc pl-6">
            <li>You violate these terms</li>
            <li>You use the service fraudulently or abusively</li>
            <li>For legal or regulatory reasons</li>
        </ul>

        <h2 class="font-bold mb-4 text-primary">14. General Provisions</h2>
        <h4 class="font-semibold mb-2">14.1 Entire Agreement</h4>
        <p class="mb-4">These terms constitute the entire agreement between you and FumoIndex.</p>
        <h4 class="font-semibold mb-2">14.2 Severability</h4>
        <p class="mb-4">If any provision is found invalid, the remaining provisions will remain in effect.</p>
        <h4 class="font-semibold mb-2">14.3 Waiver</h4>
        <p class="mb-4">Failure to enforce any right does not constitute a waiver of that right.</p>
        <h4 class="font-semibold mb-2">14.4 Assignment</h4>
        <p class="mb-4">You may not transfer your rights or obligations under these terms without our consent.</p>

        <h2 class="font-bold mb-4 text-primary">15. Attribution and Acknowledgments</h2>
        <h4 class="font-semibold mb-2">15.1 Acknowledgments</h4>
        <ul class="mb-4 list-disc pl-6">
            <li><strong>ZUN</strong> (Team Shanghai Alice) - Creator of Touhou Project</li>
            <li><strong>ANGELTYPE</strong> - Original "Inu Sakuya" concept</li>
            <li><strong>Gift Co. Ltd.</strong> - Manufacturer of the FumoFumo line</li>
            <li><strong>AstronautMarkusDev</strong> - Main Developer of FumoIndex</li>
            <li><strong>AnzarDev</strong> - Developer of FumoIndex</li>
            <li>All creators, companies, and fans whose work made this project possible</li>
        </ul>
        <h4 class="font-semibold mb-2">15.2 Use of Project Name</h4>
        <p class="mb-4">"FumoIndex" is the name of this archival project. It is not affiliated with official trademarks.</p>

        <h2 class="font-bold mb-4 text-primary">16. Contact</h2>
        <p class="mb-4">For questions, comments, or legal notifications related to these terms:</p>
        <ul class="mb-4 list-disc pl-6 font-semibold">
            <li><strong>GitHub:</strong> <a href="https://github.com/AstronautMarkus/FumoIndex" class="text-primary hover:underline">https://github.com/AstronautMarkus/FumoIndex</a></li>
            <li><strong>Issues:</strong> <a href="https://github.com/AstronautMarkus/FumoIndex/issues" class="text-primary hover:underline">https://github.com/AstronautMarkus/FumoIndex/issues</a></li>
            <li><strong>Email:</strong> contact@thefumoindex.net</li>
        </ul>

        <div class="mb-4">
            <strong>Remember:</strong>
            <ul class="list-disc pl-6">
                <li>This is a project made by fans, for fans</li>
                <li>All third-party content belongs to their respective owners</li>
                <li>You use the service at your own risk</li>
                <li>Respect the community and the rules</li>
            </ul>
        </div>

        <blockquote class="border-l-4 border-secondary pl-4 italic text-lg text-primary mb-4">
            <strong>Fumo? Fumo.</strong> ᗜˬᗜ
        </blockquote>

        <span class="block text-right text-sm text-gray-500">Last updated: January 9, 2026</span>
        <div class="flex items-center justify-end mt-8">
            <img src="{{ asset('img/FUMO_INDEX_RED.svg') }}" alt="FumoIndex Logo" class="h-10 w-auto pointer-events-none">
        </div>
    </div>
</div>
@endsection