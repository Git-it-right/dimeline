<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AZ-500.md</title>
    <style>
        /* Your CSS styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .content-wrapper {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        h1 {
            color: #333;
        }
        p {
            line-height: 1.6;
        }
        ul {
            list-style-type: disc;
            padding-left: 20px;
        }
        li {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <?php include './navbar.php'; ?>
    <div class="content-wrapper">
        <h1 id="container-registry-roles-explained">Container Registry Roles Explained</h1>
        <p>In Azure Container Registry (ACR), roles are used to control access to the registry and its resources. Azure role-based access control (RBAC) allows you to assign roles to users, groups, or service principals, granting them specific permissions to perform actions within the container registry.</p>
        
        <h2 id="key-roles-and-permissions">Key Roles and Permissions</h2>
        <ul>
            <li><strong>Owner:</strong>
                <ul>
                    <li>Manage all aspects of the registry, including access control, image repositories, and webhooks.</li>
                    <li>Grant or revoke access to other users.</li>
                    <li>Perform actions such as pushing and pulling images, deleting repositories, and managing webhooks.</li>
                </ul>
            </li>
            <li><strong>Contributor:</strong>
                <ul>
                    <li>Push and pull images to and from the registry.</li>
                    <li>Manage image repositories, such as creating and deleting repositories.</li>
                    <li>Cannot manage access control or registry settings.</li>
                </ul>
            </li>
            <li><strong>Reader:</strong>
                <ul>
                    <li>Pull images from the registry but cannot push images to it.</li>
                    <li>Cannot manage repositories, access control, or registry settings.</li>
                </ul>
            </li>
        </ul>

        <h2 id="assigning-roles">Assigning Roles</h2>
        <p>Roles can be assigned at the subscription, resource group, or registry level using Azure portal, Azure CLI, PowerShell, or Azure Resource Manager templates.</p>

        <h2 id="azure-ad-hybrid-pass-through-authentication-(pta)-explained">Azure AD Hybrid Pass-through Authentication (PTA) Explained</h2>
        <p>Azure Active Directory (Azure AD) Hybrid Pass-through Authentication (PTA) is a feature that allows organizations to provide a seamless sign-on experience for users accessing both cloud-based and on-premises applications.</p>
        
        <h3 id="key-concepts">Key Concepts</h3>
        <ul>
            <li><strong>Azure AD:</strong> Azure Active Directory is Microsoft's cloud-based identity and access management service. It provides authentication and authorization services for users and applications accessing Microsoft cloud services.</li>
            <li><strong>Hybrid Identity:</strong> Hybrid identity refers to the integration of on-premises Active Directory with Azure AD. It allows organizations to leverage their existing on-premises infrastructure while extending it to the cloud.</li>
            <li><strong>Pass-through Authentication (PTA):</strong> PTA is a component of Azure AD Connect, the synchronization tool used to connect on-premises Active Directory with Azure AD. PTA validates user credentials against on-premises Active Directory without storing them in the cloud.</li>
            <!-- Add more key concepts -->
        </ul>

        <!-- More content -->

    </div>
</body>
</html>
