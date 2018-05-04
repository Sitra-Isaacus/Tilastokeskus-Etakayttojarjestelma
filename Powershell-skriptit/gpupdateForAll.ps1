$ADComputers = Get-ADComputer -Filter * | Select Name
$eitoimi = "FENIX","CODE","CODE2"
foreach ($ADComputer in $ADComputers) {
    if ($eitoimi -contains $ADComputer.name) {
        # Nada
    }
    else {
        Invoke-Command -ComputerName $ADComputer.name -ScriptBlock {gpupdate /force}
    }
}