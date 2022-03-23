CREATE PROCEDURE dbo.sp_ObtenerPersonaFisica
AS
BEGIN
    SET NOCOUNT ON;
    DECLARE @ID INT,
            @ERROR VARCHAR(500);
    BEGIN TRY
        SELECT * FROM dbo.Tb_PersonasFisicas
        WHERE Activo = 1;
    END TRY
    BEGIN CATCH
        PRINT ERROR_MESSAGE();
        SELECT ERROR_NUMBER() * -1 AS ERROR,
               ISNULL(@ERROR, 'Error al obtener los registros.') AS MENSAJEERROR;
    END CATCH;
END;
GO