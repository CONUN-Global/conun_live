<!DOCTYPE html>
<!--
Copyright (C) 2018 Lukas Buchs
license https://github.com/lbuchs/WebAuthn/blob/master/LICENSE MIT
-->
<html>
    <head>
        <title>lbuchs/WebAutn Test</title>
        <meta charset="UTF-8">
        <script>

        /**
         * creates a new FIDO2 registration
         * @returns {undefined}
         */
        function newregistration() {

            if (!window.fetch || !navigator.credentials || !navigator.credentials.create) {
                window.alert('Browser not supported.');
                return;
            }

            // get default args
            window.fetch('http://zazz3.codns.com/index.php/api/auth?fn=getCreateArgs' + getGetParams(), {method:'GET',cache:'no-cache'}).then(function(response) {
                return response.json();

                // convert base64 to arraybuffer
            }).then(function(json) {

                // error handling
                if (json.success === false) {
                    throw new Error(json.msg);
                }

                // replace binary base64 data with ArrayBuffer. a other way to do this
                // is the reviver function of JSON.parse()
                recursiveBase64StrToArrayBuffer(json);
                return json;

               // create credentials
            }).then(function(createCredentialArgs) {
                console.log(createCredentialArgs);
                return navigator.credentials.create(createCredentialArgs);

                // convert to base64
            }).then(function(cred) {
                return {
                    clientDataJSON: cred.response.clientDataJSON  ? arrayBufferToBase64(cred.response.clientDataJSON) : null,
                    attestationObject: cred.response.attestationObject ? arrayBufferToBase64(cred.response.attestationObject) : null
                };

                // transfer to server
            }).then(JSON.stringify).then(function(AuthenticatorAttestationResponse) {
                return window.fetch('http://zazz3.codns.com/index.php/api/auth?fn=processCreate' + getGetParams(), {method:'POST', body: AuthenticatorAttestationResponse, cache:'no-cache'});

                // convert to JSON
            }).then(function(response) {
                return response.json();

                // analyze response
            }).then(function(json) {
               if (json.success) {
                   window.alert(json.msg || 'registration success');
               } else {
                   throw new Error(json.msg);
               }

               // catch errors
            }).catch(function(err) {
                window.alert(err.message || 'unknown error occured');
            });
        }


        /**
         * checks a FIDO2 registration
         * @returns {undefined}
         */
        function checkregistration() {

            if (!window.fetch || !navigator.credentials || !navigator.credentials.create) {
                window.alert('Browser not supported.');
                return;
            }

            // get default args
            window.fetch('http://zazz3.codns.com/index.php/api/auth?fn=getGetArgs' + getGetParams(), {method:'GET',cache:'no-cache'}).then(function(response) {
                return response.json();

                // convert base64 to arraybuffer
            }).then(function(json) {

                // error handling
                if (json.success === false) {
                    throw new Error(json.msg);
                }

                // replace binary base64 data with ArrayBuffer. a other way to do this
                // is the reviver function of JSON.parse()
                recursiveBase64StrToArrayBuffer(json);
                return json;

               // create credentials
            }).then(function(getCredentialArgs) {
                return navigator.credentials.get(getCredentialArgs);

                // convert to base64
            }).then(function(cred) {
                return {
                    id: cred.rawId ? arrayBufferToBase64(cred.rawId) : null,
                    clientDataJSON: cred.response.clientDataJSON  ? arrayBufferToBase64(cred.response.clientDataJSON) : null,
                    authenticatorData: cred.response.authenticatorData ? arrayBufferToBase64(cred.response.authenticatorData) : null,
                    signature : cred.response.signature ? arrayBufferToBase64(cred.response.signature) : null
                };

                // transfer to server
            }).then(JSON.stringify).then(function(AuthenticatorAttestationResponse) {
                return window.fetch('http://zazz3.codns.com/index.php/api/auth?fn=processGet' + getGetParams(), {method:'POST', body: AuthenticatorAttestationResponse, cache:'no-cache'});

                // convert to json
            }).then(function(response) {
                return response.json();

                // analyze response
            }).then(function(json) {
               if (json.success) {
                   window.alert(json.msg || 'login success');
               } else {
                   throw new Error(json.msg);
               }

               // catch errors
            }).catch(function(err) {
                window.alert(err.message || 'unknown error occured');
            });
        }

        function clearregistration() {
            window.fetch('http://zazz3.codns.com/index.php/api/auth?fn=clearRegistrations' + getGetParams(), {method:'GET',cache:'no-cache'}).then(function(response) {
                return response.json();

            }).then(function(json) {
               if (json.success) {
                   window.alert(json.msg);
               } else {
                   throw new Error(json.msg);
               }
            }).catch(function(err) {
                window.alert(err.message || 'unknown error occured');
            });
        }

        /**
         * convert RFC 1342-like base64 strings to array buffer
         * @param {mixed} obj
         * @returns {undefined}
         */
        function recursiveBase64StrToArrayBuffer(obj) {
            let prefix = '?BINARY?B?';
            let suffix = '?=';
            if (typeof obj === 'object') {
                for (let key in obj) {
                    if (typeof obj[key] === 'string') {
                        let str = obj[key];
                        if (str.substring(0, prefix.length) === prefix && str.substring(str.length - suffix.length) === suffix) {
                            str = str.substring(prefix.length, str.length - suffix.length);

                            let binary_string = window.atob(str);
                            let len = binary_string.length;
                            let bytes = new Uint8Array(len);
                            for (var i = 0; i < len; i++)        {
                                bytes[i] = binary_string.charCodeAt(i);
                            }
                            obj[key] = bytes.buffer;
                        }
                    } else {
                        recursiveBase64StrToArrayBuffer(obj[key]);
                    }
                }
            }
        }

        /**
         * Convert a ArrayBuffer to Base64
         * @param {ArrayBuffer} buffer
         * @returns {String}
         */
        function arrayBufferToBase64(buffer) {
            var binary = '';
            var bytes = new Uint8Array(buffer);
            var len = bytes.byteLength;
            for (var i = 0; i < len; i++) {
                binary += String.fromCharCode( bytes[ i ] );
            }
            return window.btoa(binary);
        }

        /**
         * Get URL parameter
         * @returns {String}
         */
        function getGetParams() {
            let url = '';
            url += '&yubico=' + (document.getElementById('cert_yubico').checked ? '1' : '0');
            url += '&solo=' + (document.getElementById('cert_solo').checked ? '1' : '0');
            url += '&hypersecu=' + (document.getElementById('cert_hypersecu').checked ? '1' : '0');
            url += '&google=' + (document.getElementById('cert_google').checked ? '1' : '0');

            url += '&requireResidentKey=' + (document.getElementById('requireResidentKey').checked ? '1' : '0');

            url += '&fmt_android-key=' + (document.getElementById('fmt_android-key').checked ? '1' : '0');
            url += '&fmt_android-safetynet=' + (document.getElementById('fmt_android-safetynet').checked ? '1' : '0');
            url += '&fmt_fido-u2f=' + (document.getElementById('fmt_fido-u2f').checked ? '1' : '0');
            url += '&fmt_none=' + (document.getElementById('fmt_none').checked ? '1' : '0');
            url += '&fmt_packed=' + (document.getElementById('fmt_packed').checked ? '1' : '0');
            url += '&fmt_tpm=' + (document.getElementById('fmt_tpm').checked ? '1' : '0');

            return url;
        }

        /**
         * force https on load
         * @returns {undefined}
         */
        window.onload = function() {
            if (location.protocol !== 'https:' && location.host !== 'localhost') {
          //      location.href = location.href.replace('http', 'https');
            }
        }

        </script>
    </head>
    <body style="font-family:sans-serif;">
        <h1 style="margin: 40px 10px 2px 0;">lbuchs/WebAuthn</h1>
        <div style="font-style: italic;">A simple PHP WebAuthn (FIDO2) server library.</div>
        <div>&nbsp;</div>
        <div>&nbsp;</div>
        <div>Simple working demo for the <a href="https://github.com/lbuchs/WebAuthn">lbuchs/WebAuthn</a> library.</div>
        <div>
            <div>&nbsp;</div>
            <table>
                <tbody><tr>
                        <td>
                            <button type="button" onclick="newregistration()">&#10133; new registration</button>
                        </td>
                        <td>
                            <button type="button" onclick="checkregistration()">&#10068; check registration</button>
                        </td>
                        <td>
                            <button type="button" onclick="clearregistration()">&#9249; clear all registrations</button>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div>&nbsp;</div>

            <div>
                <input type="checkbox" id="requireResidentKey" name="requireResidentKey">
                <label for="requireResidentKey">Use Client-side-resident Public Key Credential Source</label>
            </div>

            <div>&nbsp;</div>
            <div style="font-weight: bold">attestation statement format</div>
            <div>
                <input type="checkbox" id="fmt_android-key" name="fmt_android-key" checked>
                <label for="fmt_android-key">android-key</label>
            </div>

            <div>
                <input type="checkbox" id="fmt_android-safetynet" name="fmt_android-safetynet">
                <label for="fmt_android-safetynet">android-safetynet</label>
            </div>

            <div>
                <input type="checkbox" id="fmt_fido-u2f" name="fmt_fido-u2f" checked>
                <label for="fmt_fido-u2f">fido-u2f</label>
            </div>

            <div>
                <input type="checkbox" id="fmt_none" name="fmt_none">
                <label for="fmt_none">none</label>
            </div>

            <div>
                <input type="checkbox" id="fmt_packed" name="fmt_packed" checked>
                <label for="fmt_packed">packed</label>
            </div>

            <div>
                <input type="checkbox" id="fmt_tpm" name="fmt_tpm" disabled>
                <label for="fmt_tpm">tpm</label>
            </div>


            <div>&nbsp;</div>
            <div style="font-weight: bold">root certificates</div>
            <div>
                <input type="checkbox" id="cert_yubico" name="yubico" checked>
                <label for="cert_yubico">Accept keys signed by yubico root ca</label>
            </div>

            <div>
                <input type="checkbox" id="cert_solo" name="solo" checked>
                <label for="cert_solo">Accept keys signed by solokeys root ca</label>
            </div>

            <div>
                <input type="checkbox" id="cert_hypersecu" name="hypersecu" checked>
                <label for="cert_hypersecu">Accept keys signed by hypersecu root ca</label>
            </div>

            <div>
                <input type="checkbox" id="cert_google" name="google" checked>
                <label for="cert_google">Accept keys signed by google root ca</label>
            </div>
            <div>&nbsp;</div>
            <div style="font-size: 0.7em">(Nothing checked = accept all)</div>
        </div>
    </body>
</html>
