# Import CSV File

$Users = Import-Csv -Delimiter "," -Path "C:\CSV\testorg_users.csv"           


# Foreach loop to create Environment groups
foreach ($User in $Users)            
{            
 
    $RDEnvironment = $User.Environment
    $RDEnvGroup = "Environment-"+$RDEnvironment             
    $OU = "OU=TEST,DC=Rothovius,DC=local"
    $RDEnvGroupExists = Get-ADGroup -filter {DisplayName -eq $RDEnvGroup}

    #Check if Group already exists
    If ($RDEnvGroupExists -eq $Null){ 
    #Create group
    New-ADGroup -Name $RDEnvGroup -DisplayName $RDEnvGroup -Description "Environment Group" -GroupCategory Security -GroupScope Global -Path:$OU
    }
    Else 
    { Write-Host "$RDEnvGroup already Exists, skipping" }
    }

    

# Foreach loop to create project groups
foreach ($User in $Users)            
{            
    $Project = $User.Project
    $RDProjGroup = "Project-"+$Project             
    $OU = "OU=TEST,DC=Rothovius,DC=local"           
    $RDProjGroupExists = Get-ADGroup -filter {DisplayName -eq $RDProjectGroup}
    
    #Check if Group already exists
    If ($RDProjGroupExists -eq $Null){ 

    New-ADGroup -Name $RDProjGroup -DisplayName $RDProjGroup -Description "Project Group" -GroupCategory Security -GroupScope Global -Path:$OU
     }
    Else 
    { Write-Host "$RDProjGroup already Exists, skipping" }

    }