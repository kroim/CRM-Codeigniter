<style xmlns="http://www.w3.org/1999/html">

    nav {

        max-width: 160px;
        margin: 0;
        padding: 1em;
    }

    nav ul {
        list-style-type: none;
        padding: 0;
    }

    nav ul a {
        text-decoration: none;
    }

    article {
        margin-left: 170px;
        border-left: 1px solid gray;
        padding: 1em;
        overflow: hidden;
    }
</style>
<div class="container">


        <header style="text-align: center; margin-top: 50px">
            <h1 style="color: #000000"> Internal CRM Project Page </h1>
        </header>

            <p>1.  General System requirement.</p>
            <p style="margin-left: 20px">1.1  Login : Simple user login, this can be configured on the server backend configuration.
                1.2  Fields: User can choose what fields to show or not show on the screen.</br>
                1.3  Front Size: User can adjust table of content and table header font size.</br>
                1.4  Instance Search:  User can input any values on each field to search clients/sales data. For
                example, if a user input ONG on Full name, and OO Sales Person, screen immediately shows
                any clients who have "ONG" with Sales Person with "OO".</br>
                1.5  Instance Update: User can double-click on any fields to update information, for example,
                double-clicks client phone number to modify phone number value, after new value is
                inputted, user hit Enter on keyboard to accept the change. There is a confirmation message to
                confirm updating value, the confirmation message has OK button to accept the change and
                cancel button to cancel the update.</br>
                1.6  SMTP gateway : A SMTP gateway can be setup on the system for sending message. It must be
                compatible with SSL or TLS protocol, this configuration can be done on the server backend
                configuration file.</p>
            <p>2.  Client/Sales and Project pages.</p>
            <p style="margin-left: 20px">2.1  Data import: Client, Sales and Property data can be imported from a CSV before selecting a
                project name. Client/Sales FirstName and LastName validation; do not duplicate user data when
                First Name and Last Name combination is existing on the system, notice user which client(s)
                already exist in the system.</br>
                2.2  Import overwrite : data can be overwrite on database when import includes unique PK_clientID,</br>
                2.3  Date export: Client/Sales data can be export on CSV format on the search results, all data or
                selection results.</br>
                2.4  Add new entry : A new screen for user to add a new client, alternative it can be imported from
                CSV.</br>
                2.5  Delete entry : Data entry can be selected to delete from search results.</br>
                2.6  Selection entry: System must have select all and select all search results for sending message.</br>
                2.7  Expand project details on the client page, when user click on the number of Purchased
                Property, there should be an additional expansion table show project details below the client
                details.</br>
                2.8  Can view purchaser (client details) on the project page, all client fields should available for
                selection</br>
                2.9  Adjust field size : Field can be adjusted.</br>
                2.10  Sorting data : Data be sorted be order.</p>
            <p>3.  Messaging.</p>
            <p style="margin-left: 20px">3.1 Send message: Allow user to send message to clients or sales from a list template via SMTP.
                gateway.</br>
                3.2 Message template: User can create and delete a template. Template should compatible with
                text and HTML format from web designer to import pre-designed template onto the system.
                Message template can be modified and saved.</br>
                3.3  Message content: the message can handle dynamic data files. For example, Dear <<CustTitle>>
                    "CustFirstName" show customer’s Title and First Name on each message. Each message sends to
                        the client must include his/her sales personal contact details, if a sale personal is not available,
                        company contact should use by default.
                        3.4 Message delivery method: message must send through a secure SMTP gateway. Each message
                        automatically send admin team and send to target recipients after 3 hours when a message is
                        created, it also has ability to cancel sending the created message during the 3 hours cool down
                        period, and it has ability to click send the created message immediately.
                        3.5 Unsubscribe: each message must have a link for client to unsubscribe marking emails and system
                        must record this entry to stop sending any marking email to client in the future. Unsubscribed entry
                        can be resubscribed manually or provide an email for unsubscribing at the end of message.
            </p>



</div>