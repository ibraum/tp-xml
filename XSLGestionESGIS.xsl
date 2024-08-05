<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:template match="/">
    <html>
        <head>
            <title>XSLGestionESGIS</title>
        </head>
        <body>
            <table border="1">
                <thead>
                    <tr class="TableHead" bgcolor="yellow">
                        <th>Code</th>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Filiere</th>
                        <th>Niveau</th>
                        <th>LibelleUS</th>
                        <th>Note Devoir</th>
                        <th>Note Examen</th>
                    </tr>
                </thead>
                <tbody>
                    <xsl:for-each select="ESGIS/etudiants/etudiant[Code='3']">
                        <tr>
                            <td><xsl:value-of select="Code"/></td>
                            <td><xsl:value-of select="Nom"/></td>
                            <td><xsl:value-of select="Prenom"/></td>
                            <td><xsl:value-of select="Filiere"/></td>
                            <td><xsl:value-of select="Niveau"/></td>
                            <td><xsl:value-of select="UE/LibelleUS"/></td>
                            <td><xsl:value-of select="UE/Notes/Devoir"/></td>
                            <td><xsl:value-of select="UE/Notes/Examen"/></td>
                        </tr>
                    </xsl:for-each>
                </tbody>
            </table>
        </body>
    </html>
</xsl:template>

</xsl:stylesheet>
