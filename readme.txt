#######################################################
#######################################################

WHMCS / MediaCP Server Provisioning Module

#######################################################
#######################################################

Installation / Upgrade Documentation:
https://www.mediacp.net/documentation/whmcs-integration-guide/



#######################################################
CHANGELOG
#######################################################
2020-05-04
 - Fixed: MCP-1221 WHMCS Yes/No options no longer working with latest WHMCS version Matt 4/05/2020 1:45 PM
 - Added: Nginx-Rtmp to WHMCS Plugin Matt 30/04/2020 3:37 PM
 - Fixed: MCP-1199 Domain is not saved in WHMCS Matt 23/04/2020 2:38 PM
 - Fixed: MCP-1198 Twitch option missing from WHMCS integration Matt 23/04/2020 12:38 PM
 - Fixed: MCP-1165 WHMCS -> Login to Control Panel link is no longer working with latest WHMCS Matt 22/04/2020 3:03 PM

2020-03-11
 - Fixed: Geo Locking config options

2012-01-06
 - Added: Stream Target Options
 - Added: Geo Locking configurable options
 - Added 'Mountpoints' and 'AutoDJ Sources' configurable options
 - Added email merge fields for MediaCP URL, Service Host Address and Service Portbase

2019-10-03
 - Fixed: WHMCS Module now sets AutoDJ sources limit to 1 instead of disabled when AutoDJ is configured

2019-09-04
 - WHMCS 7.8.x Support

2019-02-27
 - Provides more descriptive error messages on failure

2019-01-21
 - Added: Flussonic Support

2019-01-04
 - Fixed: Issue with applying liquidsoap transcoder

2018-11-15
 - Added: Support for Liquidsoap Transcoder

2018-11-12 – STABLE Module
 - Fixed: Issue with password generation for services that do not accept special characters

2017-05-08
 - Updated: Module is now compatible with WHMCS 7.1
 
2017-04-09
 - Reseller services are now suspended/unsuspended along with reseller account (MCP 2.2.0.4+)

2016-04-13 – STABLE Module
 - Fixed: “Wowza Media Type” Configurable option alternative “Flash Media Service” was not being recognised.
 - Fixed: “Wowza Media Type” Configurable option setting of ‘Shoutcast/Icecast Relay’ was not being recognised.

2015-08-21 – STABLE Module
 - COMPATIBLE WITH WHMCS 6.x
 - Updated: Wowza Stream Recording, nDVR and Transcoder options now added. 2015-08-21
 - Fixed: Configurable Options now override Wowza Service Type preselections. 2015-07-03
 - Fixed: Shoutcast & Icecast RTMP Configurable Option 2015-04-15
 -  Added Custom Field for “Wowza VHost” that should be entered only by experienced users.  2014-04-01
 - Service Usage is now supported with MediaCP 2.1.8.1. 2015-01-20
 - Icecast 2/KH source & stream passwords are now set to a random string. 2015-01-20
 - Wowza Service Password is now set to WHMCS specified password. 2015-01-20
 - Fixed: Ices 0.4 & Ices 2.0 Source Plugin selections defaulting to SCTRANSV2. 2014-12-29

2015-04-15
 - Fixed: Shoutcast & Icecast RTMP Configurable Option

2015-04-01
 - Added Custom Field for "Wowza VHost" that should be entered only by experienced users. 

2015-01-28
 - Fixed Configurable Options for "Wowza Media Type"
 - All generated passwords are now classed as very strong designed to pass cPanel Strength of 100.

2015-01-20
 - Service Usage is now supported with MediaCP 2.1.8.1.
 - Icecast 2/KH source & stream passwords are now set to a random string.
 - Wowza Service Password is now set to WHMCS specified password.


2014-12-29 - BETA Module
 - Fixed: Ices 0.4 & Ices 2.0 Source Plugin selections defaulting to SCTRANSV2.

2014-12-14 - BETA Module
 - Reworked WHMCS Module from ground up.
 - Supports Multiple Servers
 - Supports System Module Debug Log
 - Change Package & Change Password functions now work properly.
 - Added ability to Restart & Stop Source/AutoDJ Services.
 - Record CustomerID, ServiceID & PublishName to WHMCS Fields
 - Allow Custom Field of Publish Name + Others for input from customer.
 - Updated/Added Configurable Options
 - Link to automatically login as Customer Account
 - Client Area Login Button