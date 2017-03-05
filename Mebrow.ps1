# CL browser for Meeser
param (
    [string]$page = '',
    [string]$context,
    [switch]$listMembers = $False,
    [switch]$htmlize = $False,
    [switch]$formize = $False
)

if ($htmlize -eq $True) {
    $w = Invoke-WebRequest http://localhost:8000/$page
} else {
    $w = Invoke-WebRequest -UserAgent 'commandline' http://localhost:8000/$page
}

if (-Not $context) {
    $w
} else {
    $w.$context
}

if ($listMembers -eq $True) {
    $w | Get-Member
}
