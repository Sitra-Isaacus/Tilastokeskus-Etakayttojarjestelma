#CREATE ADMIN GROUPS

#Create da-admins group
NEW-ADGroup –name da-admins –groupscope Global –path "OU=da-admins,OU=MgmtUsers,DC=ISAACUS,DC=local”

#Create sa-admins group
NEW-ADGroup –name sa-admins –groupscope Global –path "OU=sa-admins,OU=MgmtUsers,DC=ISAACUS,DC=local”

#Create wa-admins group
NEW-ADGroup –name wa-admins –groupscope Global –path "OU=wa-admins,OU=MgmtUsers,DC=ISAACUS,DC=local”