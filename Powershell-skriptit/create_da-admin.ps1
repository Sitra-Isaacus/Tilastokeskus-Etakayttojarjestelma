param (
[Parameter(Mandatory=$true)]
$adminfirstname = "", #First name
[Parameter(Mandatory=$true)]
$adminmobile = "+358 ", #Mobilephone number in international format
[Parameter(Mandatory=$true)]
$adminorg = "CSC",#Organization
[Parameter(Mandatory=$true)]
$adminrealname = ""#Admin full name
) 
# script variables
$adminname = "da_" + $adminfirstname
$adminfullname = $adminrealname + " - CSC Domain Admin"
$SecurePW = Read-Host -Prompt “Enter a password” -asSecureString
# Create User
New-ADUser -DisplayName:$adminname -AccountPassword $SecurePW -GivenName:$adminname -Name:$adminname -Path:"OU=AdminDA,OU=MgmtUsers,DC=ISAACUS,DC=local" -SamAccountName:$adminname -PasswordNeverExpires $True -Server:"ISAACUSDC1.ISAACUS.local" -Surname:"Admin" -Type:"user" -UserPrincipalName:$adminname@ISAACUS.local -MobilePhone:$adminmobile -Organization:$adminorg -Description:$adminfullname
# Add Domain admins (da-admins) group
Add-ADPrincipalGroupMembership -Identity:"CN=$adminname,OU=AdminDa,OU=MgmtUsers,DC=ISAACUS,DC=local" -MemberOf:"CN=da-admins,OU=AdminDA,OU=MgmtUsers,DC=ISAACUS,DC=local" -Server:"ISAACUSDC1.ISAACUS.local"
# Enable user
Enable-ADAccount -Identity:"CN=$adminname,OU=AdminDa,OU=MgmtUsers,DC=ISAACUS,DC=local"