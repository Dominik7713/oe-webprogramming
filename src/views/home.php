<?php

/** @var PDO $pdo_projects */

require_once 'projects.php';

$stmt = $pdo_projects->query("SELECT * FROM projects WHERE is_active = 1 ORDER BY order_num ASC");
$projectObjects = [];

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $projectObjects[] = new Project(
            $row['id'],
            $row['title'],
            $row['description'],
            $row['technologies'],
            $row['image_path'],
            $row['github_url'],
            $row['order_num'],
            $row['is_active'],
            $row['created_at']
    );
}
?>

<div class="cv-content">
    <h1 style="text-align: center;">Dominik Balogh</h1>
        <div class="social-links" style="text-align: center; margin-bottom: 20px;">
            <a href="https://github.com/Dominik7713" target="_blank">Github</a> |
            <a href="https://www.linkedin.com/in/dominik-balogh-ba300b220" target="_blank">Linkedin</a>
        </div>

        <hr>

        <p style="text-align: justify">
            Junior Project Manager with C# OOP foundations and user-level SAP ERP knowledge (Inquiry to-
            Order/ Quotes). Currently learning ABAP development. Leveraging professional experience
            at GE Vernova to transition into a developer role focused on enterprise digital solutions.
        </p>
        <hr>

    <h3>Projects</h3>
    <div class="projects-summary">
        <?php if (empty($projectObjects)): ?>
            <p>Coming soon...</p>
        <?php else: ?>
            <?php foreach ($projectObjects as $project): ?>
                <div class="project-item" style="margin-bottom: 15px;">
                    <strong><?php echo $project->title; ?></strong> -
                    <span class="tech-tags">
                    <?php echo implode(', ', $project->getTechnologiesList()); ?>
                </span>
                    <p style="font-size: 0.9rem; margin-top: 5px;">
                        <?php echo $project->description; ?>
                    </p>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>

        <hr>
        <h3>Skills</h3>

        <table class = "skills-table">
            <tr>
                <td class = "skills-td">ABAP</td>
                <td class = "skills-td">Object-Oriented Programming</td>

             </tr>

            <tr>
                <td class = "skills-td">C#</td>
                <td class = "skills-td">SQL</td>
            </tr>

            <tr>
                <td class = "skills-td">Git</td>
                <td class = "skills-td">SAP Functional (User-level)</td>
            </tr>
        </table>

        <hr>
        <h3>Experience</h3>

        <table class = "experience-table">
            <tr>
                <td class = "experience-date"><i>05/2024 - present</i></td>
                <td class = "experience-table-td"><i><b>Junior Project Manager<br></b></i>
                    Managed international Inquiry-to-Order (ITO) projects involving
                    engineering, sales, and logistics, ensuring cross-functional
                    alignment.<br>
                    Gained functional exposure to ERP systems: Utilized SAP Fiori to
                    review Quote details (e.g., pricing, assigned group) and Material
                    Master reports, and monitored Quote statuses in Oracle to track
                    project milestones.<br>
                    Created and maintained digital solutions (e.g., Excel, VBA,
                    Tableau, Salesforce reports)</td>

            </tr>
            <tr>
                <td class = "experience-date"><i>04/2022 – 05/2024</i></td>

                <td class = "experience-table-td"><i><b>Project Manager Intern<br></b></i>
                    Supported daily project administration and data cleaning tasks for
                    the ITO team, ensuring accurate reporting.</td>
            </tr>

        </table>

        <hr>
        <h3>Education</h3>

         <table class="education-table">
             <tr>
                 <td class="edu-date">2024 – present</td>
                 <td>
                     <strong>BSc in Business Informatics</strong><br>
                     Obuda University
                 </td>
             </tr>
             <tr>
                 <td class="edu-date">2021 – 2024</td>
                 <td>
                     <strong>BSc in Business Administration and Management</strong><br>
                     Budapest University of Technology and Economics
                 </td>
             </tr>
         </table>

        <hr>
        <h3>Languages</h3>
         <div class="languages-table">
             <div class="lang-item">
                 <strong>Hungarian</strong> – Native/Bilingual
             </div>
             <div class="lang-item">
                 <strong>English</strong> – Proficient B2
             </div>
         </div>
</div>